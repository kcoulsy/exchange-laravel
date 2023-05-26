<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    protected $guarded = ['id'];


    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function recursiveListings()
    {
        return $this->hasManyOfDescendantsAndSelf(Listing::class);
    }
}