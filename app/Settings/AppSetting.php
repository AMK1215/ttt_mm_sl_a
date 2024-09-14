<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class AppSetting extends Settings
{
    public float $provider_initial_balance;

    public static function group(): string
    {
        return 'app';
    }
    // Declare provider_initial_balance but access it from the JSON payload
    // public float $provider_initial_balance;

    // public static function group(): string
    // {
    //     return 'provider';
    // }

    // // Access the balance directly from the class property
    // public function getProviderInitialBalance(): float
    // {
    //     return $this->provider_initial_balance; // Directly access the setting field
    // }
}