<?php


namespace sadjadteh\PayPing;


use sadjadteh\PayPing\Services\Pay\PayService;
use sadjadteh\PayPing\Services\Verify\VerifyService;

class PayPing
{
    public static function pay(array $payParams)
    {
        return (new PayService())->perform($payParams);
    }

    public static function verify(array $verifyParams)
    {
        return (new VerifyService())->perform($verifyParams);
    }
}
