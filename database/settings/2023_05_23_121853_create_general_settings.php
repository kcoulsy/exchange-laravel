<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('general.copyright', 'Copyright notice');
        $this->migrator->add('general.privacy_policy', 'Privacy Policy');
        $this->migrator->add('general.terms_of_service', 'Terms of service');
    }
};