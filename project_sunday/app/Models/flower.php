<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flower extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'subdistrict',
        'price',
        'nextsend',
        'nextsend_price',
        'type_id'
    ];
}
