<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class AmountNotIntegerException extends \Exception
{
    protected $message = 'The "amount" value in the pay method params should be an integer.';
}
