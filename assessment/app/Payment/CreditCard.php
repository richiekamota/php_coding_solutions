<?php

namespace App\Payment;

use Illuminate\Support\Facades\Http;

class CreditCard extends PaymentMethod
{
    /**
     * Make a payment using a credit card and return the payment status.
     *
     * @return string The payment status, either 'paid' or 'unpaid'.
     */

    public function pay(): string
    {
        // Simulate a payment request to an external service

        $response = Http::fake(['result' => ['success' => true]])->post('https://some-external-url.example.org/api/card', $this->input);
        
        // Check if the payment request was successful and if the response indicates success

        if ($response->successful() && $response->json('result.success') === 1) {
            return 'paid';
        }
        
        // Payment request failed or response indicates failure
        
        return 'unpaid';
    }
}
