<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BakeryItem extends Model
{

    protected $fillable = [
        'name', 'image', 'price',
    ];
 
}
