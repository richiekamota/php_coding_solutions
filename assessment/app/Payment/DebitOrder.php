<?php

namespace App\Payment;

use Illuminate\Support\Facades\Http;

class DebitOrder extends PaymentMethod
{
     /**
     * Make a payment using a debit order and return the payment status.
     *
     * @return string The payment status, either 'paid' or 'unpaid'.
     */

    public function pay(): string
    {
        // Simulate a payment request to an external service

        $response = Http::fake(['debitorder' => 'ok'])->post('https://some-external-url.example.org/debitorder', $this->input);

        // Check if the payment request was successful and if the response indicates success

        if ($response->successful() && $response->json('debitorder') === 'ok') {
            return 'paid';
        }
       
        // Payment request failed or response indicates failure
        
        return 'unpaid';
    }
}