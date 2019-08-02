<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Handlers;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\AmountNotBeenSetException;
use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\AmountNotIntegerException;
use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\AmountNotInValidRangeException;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;
use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;

class AmountValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $payRequest)
    {
        $amount = $payRequest->getAmount();

        if (is_null($amount)) {
            throw new AmountNotBeenSetException();
        }

        if (!is_int($amount) || (intval($amount) !== $amount)) {
            throw new AmountNotIntegerException();
        }

        if ($amount < 100 || $amount > 50000000) {
            throw new AmountNotInValidRangeException();
        }

        return true;
    }
}
