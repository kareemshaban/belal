<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheeseMeal extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'code',
      'daily_milk_meal',
      'milk_weight',
      'quantity',
      'weight',
      'average_weight_per_milk_litter',
      'average_productivity_per_cheese_disk',
      'productivity',
      'cost_per_cheese_kilo',
      'notes',
        'user_ins',
        'user_upd'
    ];
}
