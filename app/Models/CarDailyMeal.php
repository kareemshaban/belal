<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarDailyMeal extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'car_meal_id',
        'type',
        'supplier_id',
        'date',
        'weight',
        'price',
        'total',
        'user_ins',
        'user_upd'
    ];
}
