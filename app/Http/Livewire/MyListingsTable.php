<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class MyListingsTable extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery()
    {
        return Listing::with(['category'])
            ->where('user_id', auth()->id());
    }

    protected function getTableColumns()
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('price'),
            SpatieMediaLibraryImageColumn::make('images'),
            Tables\Columns\TextColumn::make('Views')
                ->getStateUsing(fn(Listing $record) => views($record)->count()),
        ];
    }

    protected function getTableFilters(): array
    {
        return [];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('View')->url(fn(Listing $record): string => route('listings.show', [$record->category, $record])),
            // Tables\Actions\Action::make('View')->url(fn(Listing $record): string => route('listing.edit', $record)),
            // Tables\Actions\EditAction::make(),
        ];
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    public function render()
    {
        return view('livewire.my-listings-table');
    }
}