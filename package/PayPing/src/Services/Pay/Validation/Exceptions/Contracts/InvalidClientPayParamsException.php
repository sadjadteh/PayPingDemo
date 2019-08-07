<?php


namespace sadjadteh\PayPing\Services\Pay\Validation\Exceptions\Contracts;


use Symfony\Component\HttpFoundation\Response;

Abstract class InvalidClientPayParamsException extends \Exception
{
    protected $code = Response::HTTP_BAD_REQUEST;
}
