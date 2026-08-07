<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office_useDetail extends Model
{
    protected $fillable = [
        'candidate_id',
        'experience_rating',
        'communication_skills',
        'computer_skills',
        'interpersonal_skills',
        'learning_ability',
        'presentation_skills',
        'technical_skills',
        'attitude',
        'confidence',
        'interview_remarks',
        'salary_offered',
        'interview_date',
        'interview_status',
        'interviewed_by'
    ];
}
