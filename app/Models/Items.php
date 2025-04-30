<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = [
          'id',
        'code',
        'name',
        'details',
        'default_selling_price',
        'user_ins',
        'user_upd'

        ];
}
