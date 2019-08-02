<?php


namespace sadjadteh\PayPing\Services\Pay;


use sadjadteh\PayPing\Services\Validation\Contracts\RequestObjectInterface;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayRequest implements ValidationRequestObjectInterface
{
    private $amount;
    private $payerIdentity;
    private $payerName;
    private $description;
    private $returnUrl;
    private $clientRefId;

    public function __construct(array $payParams)
    {
        $this->amount        = $payParams['amount'] ? intval($payParams['amount']) : null;
        $this->payerIdentity = $payParams['payerIdentity'] ?? null;
        $this->payerName     = $payParams['payerName'] ?? null;
        $this->description   = $payParams['description'] ?? null;
        $this->returnUrl     = $payParams['returnUrl'] ?? null;
        $this->clientRefId   = $payParams['clientRefId'] ?? null;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getPayerIdentity()
    {
        return $this->payerIdentity;
    }

    /**
     * @return mixed
     */
    public function getPayerName()
    {
        return $this->payerName;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getReturnUrl()
    {
        return $this->returnUrl;
    }

    /**
     * @return mixed
     */
    public function getClientRefId()
    {
        return $this->clientRefId;
    }
}
