<?php

namespace App\Model;

use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function product() {
        return $this->belongsTo(Product::class);
    }

    /**
     * php artisan tinker
     * 
     * App\Model\Product::find(4)
     * App\Model\Product::find(4)->reviews;
     * App\Model\Review::find(5)->product;
     */
}
