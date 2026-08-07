<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class educationDetail extends Model
{
    protected $fillable = [
        'candidate_id',
        'qualification',
        'college_university',
        'passing_year',
        'percentage_cgpa'
    ];
}
