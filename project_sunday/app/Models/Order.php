<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city_id',
        'province_id',
        'phone',
        'type',
        'list',
        'quantity',
        'price',
        'customer_id',
        'total',
        'status',
        'tracking',
        'sendto',
        'price_to',
        'amount',
    ];

    protected $casts = [

    ];

    public function customer(){
        return $this->belongsTo(customer::class);
    }
    public function province(){
        return $this->belongsTo(province::class);
    }
    public function city(){
        return $this->belongsTo(city::class);
    }
}
