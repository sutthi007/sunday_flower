<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provinceTo extends Model
{
    use HasFactory;

    protected $fillable = [
        'provinces_to',
    ];

    public function hasCity(){
        return $this->hasMany(city::class);
    }
    public function hasOrder(){
        return $this->hasMany(Order::class);
    }
}
