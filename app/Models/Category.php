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

    public function recursiveListings()
    {
        return $this->hasManyOfDescendantsAndSelf(Listing::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
        ];
    }
}
