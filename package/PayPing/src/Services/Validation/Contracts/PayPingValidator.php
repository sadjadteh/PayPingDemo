<?php


namespace sadjadteh\PayPing\Services\Validation\Contracts;


abstract class PayPingValidator
{
    /**
     * @var PayPingValidator
     */
    protected $nextValidator;

    public function __construct(PayPingValidator $validator = null)
    {
        $this->nextValidator = $validator;
    }

    final public function handle(ValidationRequestObjectInterface $request)
    {
        $result = $this->process($request);

        if ($result) {
            if (!is_null($this->nextValidator)) {
                return $this->nextValidator->handle($request);
            }
            return $result;
        }

        return $result;

    }

    abstract protected function process(ValidationRequestObjectInterface $request);
}
