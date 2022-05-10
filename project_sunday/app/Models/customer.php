<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'province',
        'subdistrict',
        'phone',
        'employee',
        'total',
        'getmoney'

    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}