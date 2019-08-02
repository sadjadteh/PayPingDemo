<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidClientRefIdException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class ClientRefIdValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $clientRefId = $payRequest->getClientRefId();

        if (!is_null($clientRefId) && !is_string($clientRefId)) {
            throw new InvalidClientRefIdException();
        }

        return true;
    }
}
