<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class InvalidRefIdException extends InvalidClientPayParamsException
{
    protected $message = 'The "clientRefId" should be a string.';
}
