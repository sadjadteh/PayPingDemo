<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidDescriptionException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class DescriptionValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $payerIdentity = $payRequest->getPayerName();

        if (!is_null($payerIdentity) && !is_string($payerIdentity)) {
            throw new InvalidDescriptionException();
        }

        return true;
    }
}
