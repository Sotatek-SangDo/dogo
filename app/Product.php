<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Extensions\HasManySyncable;

class Product extends Model
{
    public $table = 'products';

    public $fillable = ['id', 'title', 'description', 'thumbnail', 'cat_id'];
}
