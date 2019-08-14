<?php


namespace sadjadteh\PayPing\Services\Verify\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidRefIdException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class RefIdValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $verificationRequest)
    {
        $refId = $verificationRequest->getRefId();

        if (!is_null($refId) && !is_string($refId)) {
            throw new InvalidRefIdException();
        }

        return true;
    }
}
