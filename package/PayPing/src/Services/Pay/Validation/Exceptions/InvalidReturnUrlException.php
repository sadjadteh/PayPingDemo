<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class InvalidReturnUrlException extends \Exception
{
    protected $message = 'The "returnUrl" should be a valid URL.';
}
