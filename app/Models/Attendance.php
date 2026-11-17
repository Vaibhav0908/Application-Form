<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";

    protected $fillable = [
        'user_id',
        'user_type',
        'name',
        'date',
        'login_time',
        'logout_time',
        'overtime',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}
