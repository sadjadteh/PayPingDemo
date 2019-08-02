<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\InvalidReturnUrlException;
use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\ReturnUrlNotBeenSetException;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class ReturnUrlValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $returnUrl = $payRequest->getReturnUrl();

        if (is_null($returnUrl)) {
            throw new ReturnUrlNotBeenSetException();
        }

        if (!filter_var($returnUrl, FILTER_VALIDATE_URL)) {
            throw new InvalidReturnUrlException();
        }

        return true;
    }
}
