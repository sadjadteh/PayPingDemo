<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


use sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts\InvalidClientPayParamsException;

class InvalidDescriptionException extends InvalidClientPayParamsException
{
    protected $message = 'The "description" should be a string.';
}
