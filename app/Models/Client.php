<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'type',
      'name',
      'phone',
      'buffalo_min_limit',
      'buffalo_max_limit',
      'bovine_min_limit',
      'bovine_max_limit',
      'address',
      'car_id',
        'user_ins',
        'user_upd',
        'buffalo_price',
        'bovine_price',
    ];
}
