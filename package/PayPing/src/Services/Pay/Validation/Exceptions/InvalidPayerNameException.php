<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class InvalidPayerNameException extends InvalidClientPayParamsException
{
    protected $message = 'The "payerName" should be a string.';
}
