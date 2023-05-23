<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class ManageSettings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';

    protected static string $settings = GeneralSettings::class;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\MarkdownEditor::make('copyright')
                ->label('Copyright notice')
                ->required(),
            Forms\Components\MarkdownEditor::make('terms_of_service')
                ->label('Terms of Service')
                ->required(),
            Forms\Components\MarkdownEditor::make('privacy_policy')
                ->label('Privacy Policy')
                ->required(),

        ];
    }
}