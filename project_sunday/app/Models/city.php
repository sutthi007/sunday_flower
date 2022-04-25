<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_id',
        'city'
    ];

    public function province(){
        return $this->belongsTo(province::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
