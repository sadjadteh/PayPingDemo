<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class InvalidDescriptionException extends \Exception
{
    protected $message = 'The "description" should be a string.';
}
