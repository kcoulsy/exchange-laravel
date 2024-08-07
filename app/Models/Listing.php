<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;


class Listing extends Model implements HasMedia, Viewable
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Searchable, InteractsWithViews;

    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaCollection('images')
            ->useDisk('r2');
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'model' => $this->model,
            'slug' => $this->slug,
            'description' => $this->description,
        ];
    }

    public function getUrl()
    {
        return "/{$this->category->slug}/{$this->slug}";
    }

    public function scopeFilter(Builder $query)
    {
        $currency_ids = collect(explode(',', request()->input('currencies')))
            ->map(fn($i) => trim($i))
            ->all();

        if (count($currency_ids) > 0) {
            $listings = $query->whereIn('currency_id', $currency_ids);
        }

        $condition_ids = collect(explode(',', request()->input('conditions')))
            ->map(fn($i) => trim($i))
            ->all();

        if (count($condition_ids) > 0) {
            $listings = $listings->whereIn('condition_id', $condition_ids);
        }
    }
}