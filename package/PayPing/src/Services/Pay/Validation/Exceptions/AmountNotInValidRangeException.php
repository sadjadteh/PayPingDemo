<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class AmountNotInValidRangeException extends \Exception
{
    protected $message = 'The "amount" value in the pay method params should be between 100 and 50000000.';
}
