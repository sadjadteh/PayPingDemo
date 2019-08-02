<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class AmountNotBeenSetException extends \Exception
{
    protected $message = 'The "amount" value in the pay method params is required.';
}
