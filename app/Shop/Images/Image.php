<?php

namespace App\Shop\Images;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id',
        'src'
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
