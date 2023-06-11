<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $copyright;

    public string $privacy_policy;

    public string $terms_of_service;

    public static function group(): string
    {
        return 'general';
    }
}
