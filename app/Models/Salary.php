<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'employee_id',
      'week_start',
      'week_end',
      'total_amount',
      'isPaid',
      'user_ins',
      'user_upd'
    ];
}
