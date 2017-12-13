<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ImageProduct extends Model
{
    public $table = 'image_product';

    public $fillable = ['pro_id', 'pro_img'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
