<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
	Route::post('doPayment', PaymentController::class);
});