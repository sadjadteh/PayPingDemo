<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class AmountNotInValidRangeException extends InvalidClientPayParamsException
{
    protected $message = 'The "amount" value in the pay method params should be between 100 and 50000000.';
}
