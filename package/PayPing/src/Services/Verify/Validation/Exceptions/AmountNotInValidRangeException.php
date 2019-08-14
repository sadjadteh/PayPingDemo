<?php


namespace sadjadteh\PayPing\Services\Verify\Validation\Exceptions;


use sadjadteh\PayPing\Services\Verify\Validation\Exceptions\Contracts\InvalidClientVerificationParamsException;

class AmountNotInValidRangeException extends InvalidClientVerificationParamsException
{
    protected $message = 'The "amount" value in the verify method params should be between 100 and 50000000.';
}
