<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
    ];

    public function city(){
        return $this->hasMany(city::class);
    }
    public function orderForm(){
        return $this->hasMany(Order::class);
    }
}
