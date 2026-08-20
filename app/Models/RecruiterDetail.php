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
    ];

    protected $hidden = [
        'password',
    ];
}
