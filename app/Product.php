<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Extensions\HasManySyncable;
use App\ImageProduct;

class Product extends Model
{
    public $table = 'products';

    public $fillable = ['id', 'title', 'description', 'thumbnail', 'cat_id'];

    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class, 'pro_id', 'id');
    }
}
