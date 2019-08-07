<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class InvalidReturnUrlException extends InvalidClientPayParamsException
{
    protected $message = 'The "returnUrl" should be a valid URL.';
}
