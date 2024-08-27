<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class CustomValidationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('validateTimeRange', function ($attribute, $value, $parameters, $validator) {
            $startTime = strtotime('07:30 AM');
            $endTime = strtotime('04:30 PM');
            $inputTime = strtotime($value);

            return $inputTime >= $startTime && $inputTime <= $endTime;
        });
    }

    public function register()
    {
        //
    }
}
