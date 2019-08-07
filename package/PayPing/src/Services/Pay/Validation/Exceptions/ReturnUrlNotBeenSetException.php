<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class ReturnUrlNotBeenSetException extends InvalidClientPayParamsException
{
    protected $message = 'The "returnUrl" value in the pay method params is required.';
}
