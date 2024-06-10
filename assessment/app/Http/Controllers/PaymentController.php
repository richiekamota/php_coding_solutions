<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Payment\PaymentFactory;

class PaymentController extends Controller
{
    /**
     * Process a payment request and return the payment status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array An array containing the payment status and the request input.
     */
    
    public function doPayment(Request $request) :array
    {
        $paymentMethod = $request->input('payment_method');
        $payment = PaymentFactory::createPayment($paymentMethod, $request->all());
        $status = $payment->pay();

        return [
            'status' => $status,
            'input' => $request->all(),
        ];
    }
}