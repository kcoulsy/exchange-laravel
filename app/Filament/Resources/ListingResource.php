<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ListingResource\Pages;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Currency;
use App\Models\Listing;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ListingResource extends Resource
{
    protected static ?string $model = Listing::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
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

        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->required()
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\Select::make('currency_id')
                    ->label('Currency')
                    ->preload()
                    ->required()
                    ->options(Currency::all()->pluck('name', 'id'))
                    ->searchable(),
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
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', uniqid() . '-' . \Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_por')
                    ->label('Price on Request')
                    ->required(),
                Forms\Components\MarkdownEditor::make('description')
                    ->fileAttachmentsDisk('admin-uploads')
                    ->fileAttachmentsVisibility('public')
                    ->required(),
                Forms\Components\TextInput::make('location')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('images')
                    ->disk('r2')
                    ->collection('images')
                    ->responsiveImages()
                    ->multiple()
                    ->enableReordering(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('images')->disk('r2')->collection('images'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\IconColumn::make('is_por')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListListings::route('/'),
            'create' => Pages\CreateListing::route('/create'),
            'edit' => Pages\EditListing::route('/{record}/edit'),
        ];
    }
}