<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    protected $table = 'employee_details';

    protected $fillable = [
        'name',
        'candidate_id',
        'designation',
        'department',
        'email',
        'password',
        'salary',
        'joing_date',
        'calender',
        'status',
        'last_seen',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'last_seen' => 'datetime',
    ];

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

}