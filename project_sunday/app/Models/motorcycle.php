<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class motorcycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'subdistrict',
        'price',

    ];
}
