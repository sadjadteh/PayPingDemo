<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class InvalidPayerIdentityException extends \Exception
{
    protected $message = 'ُThe "payerIdentity" should be the customer email or mobile number in string format.';
}
