<?php

namespace App\Payment;

class PaymentMethod
{
    protected $input;

    public function __construct($input)
    {
        $this->input = $input;
    }

     /**
     * Process a payment and return the payment status.
     *
     * This method can be overridden by subclasses to implement specific payment logic.
     *
     * @return string The payment status, either 'paid' or 'unpaid'.
     */
    
    public function pay(): string
    {
        return 'unpaid';
    }
}