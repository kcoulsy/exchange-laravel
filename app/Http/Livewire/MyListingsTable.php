<?php

namespace App\Http\Livewire;

use App\Models\Listing;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables;
use Illuminate\Database\Query\Builder;
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
            Tables\Columns\TextColumn::make('subtitle')
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('price'),
            Tables\Columns\IconColumn::make('is_por')
                ->label('Hide Price')
                ->boolean(),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('location'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime(),
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