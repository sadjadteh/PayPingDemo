<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidPayerNameException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayerNameValidator extends PayPingValidator
{

    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $payerIdentity = $payRequest->getPayerName();

        if (!is_null($payerIdentity) && !is_string($payerIdentity)) {
            throw new InvalidPayerNameException();
        }

        return true;
    }
}
