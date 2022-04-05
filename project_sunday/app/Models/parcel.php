<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcel extends Model
{
    use HasFactory;

    protected $fillable = [
        'list',
        'priceS',
        'priceM',
        'priceL',
        'type_id'

    ];
}
