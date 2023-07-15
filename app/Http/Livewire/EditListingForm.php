<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\View;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Filament\Forms;

class EditListingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public Listing $listing;

    public function render()
    {
        return view('livewire.edit-listing-form');
    }

    public function mount(): void
    {
        $this->form->fill([
            'title' => $this->listing->title,
            'subtitle' => $this->listing->subtitle,
            'slug' => $this->listing->slug,
            'category_id' => $this->listing->category_id,
            'condition_id' => $this->listing->condition_id,
            'brand_id' => $this->listing->brand_id,
            'currency_id' => $this->listing->currency_id,
            'price' => $this->listing->price,
            'description' => $this->listing->description,
            'images' => $this->listing->getMedia('images'),
            'location' => $this->listing->location,
            'model' => $this->listing->model,
            'is_por' => $this->listing->is_por,
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

    protected function getFormModel(): Listing
    {
        return $this->listing;
    }

    protected function getFormSchema(): array
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

            SpatieMediaLibraryFileUpload::make('images')
                ->collection('images')
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
}