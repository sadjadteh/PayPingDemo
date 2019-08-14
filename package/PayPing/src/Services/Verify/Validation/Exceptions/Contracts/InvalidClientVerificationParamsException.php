<?php


namespace sadjadteh\PayPing\Services\Verify\Validation\Exceptions\Contracts;


use Symfony\Component\HttpFoundation\Response;

Abstract class InvalidClientVerificationParamsException extends \Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
}
