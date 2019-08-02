<?php


namespace sadjadteh\PayPing;


use Illuminate\Support\ServiceProvider;

class PayPingServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/payping.php',
            'payping'
        );

        $this->publishes([
            __DIR__.'/config/payping.php' => config_path('payping.php'),
        ], 'config');
    }
}
