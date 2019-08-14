<?php


namespace sadjadteh\PayPing\Services\Verify\Validation\Handlers;


use sadjadteh\PayPing\Services\Validation\Contracts\PayPingValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;
use sadjadteh\PayPing\Services\Verify\Validation\Exceptions\AmountNotBeenSetException;
use sadjadteh\PayPing\Services\Verify\Validation\Exceptions\AmountNotIntegerException;
use sadjadteh\PayPing\Services\Verify\Validation\Exceptions\AmountNotInValidRangeException;

class AmountValidator extends PayPingValidator
{
    protected function process(ValidationRequestObjectInterface $verificationRequest)
    {
        $amount = $verificationRequest->getAmount();

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
