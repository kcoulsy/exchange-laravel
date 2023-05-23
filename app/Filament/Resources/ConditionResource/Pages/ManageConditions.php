<?php

namespace App\Filament\Resources\ConditionResource\Pages;

use App\Filament\Resources\ConditionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageConditions extends ManageRecords
{
    protected static string $resource = ConditionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
