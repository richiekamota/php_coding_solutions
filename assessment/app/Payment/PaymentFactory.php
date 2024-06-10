<?php

namespace App\Payment;

class PaymentFactory
{
   /**
     * Create a new payment method instance based on the given method.
     *
     * @param string $method
     * @param array $input
     * @return PaymentMethod
     * @throws \InvalidArgumentException if an invalid payment method is provided.
     */
    
    public static function createPayment($method, $input): PaymentMethod
    {
        switch ($method) {
            case 'debitorder':
                return new DebitOrder($input);
            case 'creditcard':
                return new CreditCard($input);
            case 'debitcard':
                return new DebitCard($input);
            default:
                throw new \InvalidArgumentException('Invalid payment method');
        }
    }
}