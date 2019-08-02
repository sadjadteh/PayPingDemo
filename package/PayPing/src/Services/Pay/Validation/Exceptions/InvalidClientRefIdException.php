<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions;


class InvalidClientRefIdException extends \Exception
{
    protected $message = 'The "clientRefId" should be a string.';
}
