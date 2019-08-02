<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class ReturnUrlNotBeenSetException extends \Exception
{
    protected $message = 'The "returnUrl" value in the pay method params is required.';
}
