<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMilkMeal extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'code',
      'weakly_meal_id',
      'type',
      'date',
      'supplier_id',
      'buffalo_weight',
      'bovine_weight',
        'hasBonus',
      'notes',
        'user_ins',
        'user_upd'
    ];
}
