<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class CreateListingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.create-listing-form');
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function submit(): void
    {
        $fields = $this->form->getState();
        $fields['slug'] = uniqid() . '-' . \Str::slug($fields['title']);
        $fields['user_id'] = auth()->id();
        Listing::create($fields);

        response()->redirectToRoute('categories.index');
    }


    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', uniqid() . '-' . \Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->hidden(),
                Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255),
            ]),
            Forms\Components\Select::make('category_id')
                ->label('Category')
                ->required()
                ->options(Category::all()->pluck('name', 'id'))
                ->searchable(),
            Forms\Components\Select::make('condition_id')
                ->label('Condition')
                ->preload()
                ->required()
                ->options(Condition::all()->pluck('name', 'id'))
                ->searchable(),
            Forms\Components\Select::make('brand_id')
                ->label('Brand')
                ->required()
                ->options(Brand::all()->pluck('name', 'id'))
                ->searchable(),
            Forms\Components\TextInput::make('location')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('model')
                ->maxLength(255)
                ->required(),

            Forms\Components\MarkdownEditor::make('description')
                ->fileAttachmentsDisk('admin-uploads')
                ->fileAttachmentsVisibility('public')
                ->required(),

            SpatieMediaLibraryFileUpload::make('images')
                ->multiple()
                ->enableReordering(),
            Grid::make(3)->schema([
                Forms\Components\Select::make('currency_id')
                    ->label('Currency')
                    ->preload()
                    ->required()
                    ->options(Currency::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_por')
                    ->label('Price on Request')
                    ->required(),
            ]),
        ];
    }

    protected function getFormModel(): string
    {
        return Listing::class;
    }
}