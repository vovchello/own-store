<?php

namespace App\Shop\Products;

use App\Shop\Categories\Category;
use App\Shop\Images\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'status',
        'slug'
    ];

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeAvailable(Builder $query)
    {
        return $query->where('status', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
}
