<?php


namespace sadjadteh\PayPing\Services\Verify\Validation;


use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;
use sadjadteh\PayPing\Services\Verify\Validation\Handlers\AmountValidator;
use sadjadteh\PayPing\Services\Verify\Validation\Handlers\RefIdValidator;

class VerificationRequestValidator
{
    public function validate(ValidationRequestObjectInterface $verificationRequest)
    {
        $validator = new RefIdValidator();
        $validator = new AmountValidator($validator);

        return $validator->handle($verificationRequest);
    }
}
