<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class InvalidPayerNameException extends \Exception
{
    protected $message = 'The "payerName" should be a string.';
}
