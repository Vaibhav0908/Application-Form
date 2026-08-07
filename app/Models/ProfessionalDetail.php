<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionalDetail extends Model
{
    protected $fillable = [
        'candidate_id',
        'company_name',
        'designation',
        'salary_ctc',
        'currently_working',
        'working_start_date',
        'working_end_date'
    ];
}
