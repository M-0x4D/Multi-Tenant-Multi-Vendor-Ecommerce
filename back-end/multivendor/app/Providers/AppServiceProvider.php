<?php

namespace App\Providers;

use App\Http\Controllers\Api\Payment\CashOnDeliver;
use App\Http\Controllers\Api\Payment\PayPalPaymentController;
use App\Interfaces\PaymentGatewayInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $gateWay = request()->input('gateway');

        match ($gateWay) {
            'paypal' => $this->app->bind(PaymentGatewayInterface::class, PayPalPaymentController::class),
            'cash-on-deliver' => $this->app->bind(PaymentGatewayInterface::class, CashOnDeliver::class),
        };
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
