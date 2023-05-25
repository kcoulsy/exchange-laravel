<?php

namespace App\Filament\Widgets;

use App\Models\Listing;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Users', User::count()),
            Card::make('Listings', Listing::count()),
        ];
    }
}