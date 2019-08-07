<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class InvalidPayerIdentityException extends InvalidClientPayParamsException
{
    protected $message = 'ُThe "payerIdentity" should be the customer email or mobile number in string format.';
}
