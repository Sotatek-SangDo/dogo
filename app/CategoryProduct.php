<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $table = 'category_products';

    public $fillable = ['name', 'code_id'];
}
