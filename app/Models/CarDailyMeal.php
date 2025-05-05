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
            'car_id',
        'weakly_meal_id',
        'type',
        'date',
        'supplier_id',
        'buffalo_weight',
        'bovine_weight',
        'notes',
        'buffalo_weight_difference',
        'bovine_weight_difference',
        'user_ins',
        'user_upd'
    ];
}
