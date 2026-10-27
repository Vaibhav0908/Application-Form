<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    protected $fillable = [
        'employee_id',
        'name',
        'designation',
        'department',
        'leave_type',
        'days',
        'half_day_date',
        'full_day_date',
        'paid_day_date',
        'start_date',
        'end_date',
        'time',
        'reason',
        'status',
        'response',
    ];

      protected $casts = [
        'half_day_date' => 'date',
        'full_day_date' => 'date',
        'paid_day_date' => 'date',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
