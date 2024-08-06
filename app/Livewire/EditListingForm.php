<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;
use Filament\Forms\Components\Grid;
// use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Form;

class EditListingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];
    
    public function render()
    {
        return view('livewire.edit-listing-form');
    }

    public function mount(Listing $listing): void
    {

        $this->form->fill([
            'title' => $listing->title,
            'subtitle' => $listing->subtitle,
            'slug' => $listing->slug,
            'category_id' => $listing->category_id,
            'condition_id' => $listing->condition_id,
            'brand_id' => $listing->brand_id,
            'currency_id' => $listing->currency_id,
            'price' => $listing->price,
            'description' => $listing->description,
            'images' => $listing->getMedia('images'),
            'location' => $listing->location,
            'model' => $listing->model,
            'is_por' => $listing->is_por,
        ]);
    }

    public function submit(): void
    {
        $fields = $this->form->getState();
        // TODO if slug is changed, we need to add a redirect from the old slug to the new one
        // deleting the listing should remove all redirects
        $fields['slug'] = uniqid() . '-' . \Str::slug($fields['title']);
        $fields['user_id'] = auth()->id();
        $this->listing->update($fields);

        response()->redirectToRoute('categories.index');
    }

  
    protected function form(Form $form): Form
    {
        $categories = Category::all();

        $categories_options = $categories->flatMap(function ($category) use ($categories) {
            $parent_names = '';
            $parent_id = $category->parent_id;

            while ($parent_id) {
                $parent = $categories->where('id', $parent_id)->first();
                if ($parent) {
                    $parent_names = $parent->name . ' > ' . $parent_names;
                    $parent_id = $parent->parent_id;
                } else {
                    $parent_id = null;
                }
            }

            return [
                "{$category->id}" => $parent_names . $category->name,
            ];
        })->toArray();

        return $form->schema([
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
                ->placeholder('Select a category')
                ->required()
                ->options($categories_options)
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
            // SpatieMediaLibraryFileUpload::make('images')
            //     ->disk('r2')
            //     ->collection('images')
            //     ->responsiveImages()
            //     ->multiple()
            //     ->enableReordering(),
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
        ])
        ->statePath('data');
    }
}