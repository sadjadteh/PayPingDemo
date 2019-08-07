<?php


namespace sadjadteh\PayPing\Services\Pay;


use GuzzleHttp\Client;
use sadjadteh\PayPing\Services\Pay\Validation\PayRequestValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayService
{
    public function perform(array $payParams)
    {
        /* Build an object with params got from the user. This object helps us to validate these params easily. */
        $payRequest = new PayRequest($payParams);

        /* Validating the request params got from the user. If the request is not valid, a suitable exception will be thrown. */
        $this->validateClientParams($payRequest);

        /* Send the params to the payping api and get the code. */
        $code = $this->sendPayRequest($payParams);

        return $this->goToPayPingPaymentPage($code);
    }

    /**
     * This method validates params sent by the client to the pay (get code) method.
     *
     * @param ValidationRequestObjectInterface $payRequest
     *
     * @return
     */
    private function validateClientParams(ValidationRequestObjectInterface $payRequest)
    {
        return (new PayRequestValidator())->validate($payRequest);
    }

    /**
     * Build the pay (get code) request and send it to the payping api. The response will be standardized as an object
     * built from the PayResponse class.
     *
     * @param array $payParams
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendPayRequest(array $payParams):string
    {
        $client = new Client([
            'base_uri' => config('payping.baseURI'),
        ]);

        $headers = [
            'Authorization' => config('payping.authorizationToken'),
            'Content-Type'  => 'application/json',
        ];

        $body = json_encode($payParams);

        $response = $client->request('POST', config('payping.payURI'), [
            'headers'     => $headers,
            'body'        => $body,
            'http_errors' => false,
        ]);

        return (new PayResponse($response))->getCode();
    }

    private function goToPayPingPaymentPage($code)
    {
        $payPingPaymentPage = config('payping.baseURI') . config('payping.paymentPage') . $code;

        return redirect()->to($payPingPaymentPage);
    }
}
