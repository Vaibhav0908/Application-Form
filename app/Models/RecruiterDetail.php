<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecruiterDetail extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'last_seen',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'last_seen' => 'datetime',
    ];
}
