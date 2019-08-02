<?php


namespace sadjadteh\PayPing;


use sadjadteh\PayPing\Services\Pay\PayService;

class PayPing
{
    public static function pay(array $payParams)
    {
        return (new PayService())->perform($payParams);
    }
}
