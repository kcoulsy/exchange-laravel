<?php

namespace App\Filament\Resources\ListingResource\Pages;

use App\Filament\Resources\ListingResource;
use App\Models\Listing;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListListings extends ListRecords
{
    protected static string $resource = ListingResource::class;

    protected function getHeaderActions(): array
    {
        $actions = [
            Actions\CreateAction::make(),
        ];

        if (!app()->environment('production')) {
            $actions[] = Actions\Action::make('Seed 2 Listings')
                ->label('Seed')
                ->color('gray')
                ->icon('heroicon-o-arrow-path')
                ->action(fn() => Listing::factory(2)->create());
        }

        return $actions;
    }
}