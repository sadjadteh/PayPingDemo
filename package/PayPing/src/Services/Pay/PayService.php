<?php


namespace sadjadteh\PayPing\Services\Pay;


use GuzzleHttp\Client;
use sadjadteh\PayPing\Services\Pay\Validation\PayRequestValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayService
{
    public function perform(array $payParams)
    {
        $payRequest = new PayRequest($payParams);

        if ($this->validate($payRequest)) {
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

            dd($response->getBody()->getContents());
        }

        return null;
    }

    /**
     * @param ValidationRequestObjectInterface $payRequest
     *
     * @return
     */
    private function validate(ValidationRequestObjectInterface $payRequest)
    {
        return (new PayRequestValidator())->perform($payRequest);
    }
}
