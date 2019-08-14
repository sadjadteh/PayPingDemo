<?php


namespace sadjadteh\PayPing\Services\Verify;


use GuzzleHttp\Client;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;
use sadjadteh\PayPing\Services\Verify\Validation\VerificationRequestValidator;

class VerifyService
{
    public function perform(array $verifyParams)
    {
        /* Build an object with params got from the user (developer) to verify the payment */
        $verificationRequest = new VerificationRequest($verifyParams);

        /* Validating the request params got from the user (developer). If the request is not valid, a suitable exception will be thrown. */
        $this->validateClientParams($verificationRequest);

        /* Send the params to the payping api to verify the payment. */
        $code = $this->sendVerificationRequest($verifyParams);
    }

    private function validateClientParams(ValidationRequestObjectInterface $verificationRequest)
    {
        return (new VerificationRequestValidator())->validate($verificationRequest);
    }

    /**
     * Build the verification request and send it to the payping api. The response will be standardized as an object
     * built from the VerificationResponse class.
     *
     * @param array $verifyParams
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendVerificationRequest(array $verifyParams):string
    {
        $client = new Client([
            'base_uri' => config('payping.baseURI'),
        ]);

        $headers = [
            'Authorization' => config('payping.authorizationToken'),
            'Content-Type'  => 'application/json',
        ];

        $body = json_encode($verifyParams);

        $response = $client->request('POST', config('payping.verifyURI'), [
            'headers'     => $headers,
            'body'        => $body,
            'http_errors' => false,
        ]);

        dd($response->getStatusCode(), $response->getBody()->getContents());
        return (new PayResponse($response))->getCode();
    }
}
