<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customerdata extends Model
{
    protected $fillable = [
        'uuid', ' name', 'deliveryaddress', 'phone', 'extradetail'
    ];
}
