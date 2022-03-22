<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'province',
        'phone',
        'type',
        'list',
        'quantity',
        'price',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(customer::class);
    }
}
