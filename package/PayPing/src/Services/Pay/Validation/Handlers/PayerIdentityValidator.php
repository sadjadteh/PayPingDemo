<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidPayerIdentityException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayerIdentityValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $payerIdentity = $payRequest->getPayerIdentity();

        if (!is_null($payerIdentity) && !is_string($payerIdentity)) {
            throw new InvalidPayerIdentityException();
        }

        return true;
    }
}
