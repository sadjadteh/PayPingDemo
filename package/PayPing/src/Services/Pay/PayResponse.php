<?php


namespace sadjadteh\PayPing\Services\Pay;


use GuzzleHttp\Psr7\Response;

class PayResponse
{
    /**
     * @var string
     */
    private $response;
    private $responseBody;
    private $responseStatusCode;
    private $responseBodyObject;

    /**
     * PayResponse constructor.
     * Get the json response from the payping api in the constructor.
     * Pay attention that this response is manipulated by guzzle so we have some methods like getBody, getStatusCode ... .
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        /* Get the body of the payping api response. */
        $this->responseBody = $response->getBody()->getContents();
        $this->responseBodyObject = json_decode($this->responseBody);

        /* Get the payping response status code */
        $this->responseStatusCode = $response->getStatusCode();
    }

    public function getCode()
    {
        if ($this->checkResponse()) {
            return $this->responseBodyObject->code;
        };
    }

    /**
     * Check the response. If it has a 200 status code we return true. Else a suitable exception is thrown.
     *
     * @return bool
     * @throws \Exception
     */
    private function checkResponse()
    {
        /* If the status code is 200, "true" is returned. */
        if ($this->responseStatusCode === 200) {
            return true;
        }

        /* A standard error returned from payping should have an "Error" key. If this is the case, an exception is thrown
           with the value of this key.
         */
        if (isset($this->responseBodyObject->Error)) {
            throw new \Exception($this->responseBodyObject->Error, $this->responseStatusCode);
        };

        /* If there is no error key in the body of the response (not sure it's possible), the exception will contain the
           response whole body.
         */
        throw new \Exception($this->responseBody, $this->responseStatusCode);
    }
}
