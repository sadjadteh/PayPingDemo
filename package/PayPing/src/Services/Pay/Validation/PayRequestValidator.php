<?php


namespace sadjadteh\PayPing\Services\Pay\Validation;


use sadjadteh\PayPing\Services\Pay\Validation\Handlers\AmountValidator;
use sadjadteh\PayPing\Services\Pay\Validation\Handlers\ClientRefIdValidator;
use sadjadteh\PayPing\Services\Pay\Validation\Handlers\DescriptionValidator;
use sadjadteh\PayPing\Services\Pay\Validation\Handlers\PayerIdentityValidator;
use sadjadteh\PayPing\Services\Pay\Validation\Handlers\PayerNameValidator;
use sadjadteh\PayPing\Services\Pay\Validation\Handlers\ReturnUrlValidator;
use sadjadteh\PayPing\Services\Validation\Contracts\ValidationRequestObjectInterface;

class PayRequestValidator
{
    public function validate(ValidationRequestObjectInterface $payRequest)
    {
        $validator = new DescriptionValidator();
        $validator = new PayerIdentityValidator($validator);
        $validator = new ClientRefIdValidator($validator);
        $validator = new PayerNameValidator($validator);
        $validator = new ReturnUrlValidator($validator);
        $validator = new AmountValidator($validator);

        return $validator->handle($payRequest);
    }
}
