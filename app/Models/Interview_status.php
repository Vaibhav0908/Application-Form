<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview_status extends Model
{
    protected $table = 'interview_status';
    
    protected $fillable = [
        'interview_status',
        'status'
    ];
}
