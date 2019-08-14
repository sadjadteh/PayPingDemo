<?php


namespace sadjadteh\PayPing\Services\Verify;


use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class VerificationRequest implements ValidationRequestObjectInterface
{
    private $amount;
    private $refId;

    public function __construct(array $verifyParams)
    {
        $this->amount = isset($verifyParams['amount']) ? intval($verifyParams['amount']) : null;
        $this->refId = isset($verifyParams['refId']) ? (string) $verifyParams['refId'] : null;
    }

    /**
     * @return int|null
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @return string|null
     */
    public function getRefId(): ?string
    {
        return $this->refId;
    }
}
