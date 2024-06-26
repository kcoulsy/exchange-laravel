<?php

namespace App\Livewire;

use App\Models\Listing;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
// use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Livewire\Component;

class MyListingsTable extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    protected function getTableQuery()
    {
        return Listing::with(['category'])
            ->where('user_id', auth()->id());
    }

    protected function getTableColumns()
    {
        return [
            // SpatieMediaLibraryImageColumn::make('images')->collection('images'),
            Tables\Columns\TextColumn::make('title')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('price'),
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
            Tables\Actions\Action::make('Edit')->url(fn(Listing $record): string => route('listings.edit', $record)),
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