<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory, HasRecursiveRelationships, Searchable;

    protected $guarded = ['id'];

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function recursiveListings()
    {
        return $this->hasManyThrough(Listing::class, Category::class, 'parent_id', 'category_id')
            ->orWhere('listings.category_id', $this->id);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
