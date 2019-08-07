<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class AmountNotBeenSetException extends InvalidClientPayParamsException
{
    protected $message = 'The "amount" value in the pay method params is required.';
}
