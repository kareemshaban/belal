<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
      'id',
      'tag',
      'name',
      'phone',
      'address',
      'salary',
      'workHoursCount',
      'workDaysCount',
      'offWeaklyDaysCount',
      'user_ins',
       'user_upd'
    ];
}
