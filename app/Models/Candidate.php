<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Candidate extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'contact_no',
        'alternate_contact',
        'gender',
        'dob',
        'city',
        'state',
        'pincode',
        'nationality',
        'religion',
        'marital_status',
        'permanent_address',
        'current_address',
        'applicant_designation',
        'reference_name',
        'platform_name',
        'skills',
        'resume',
        'aadhar_card',
        'passport_photo',
        'degree_certificate',
        'passbook',
        'current_salary',
        'expected_salary',
        'total_experience',
        'notice_period',
        'status'
    ];

    public function familyDetails(): HasMany
    {
        return $this->hasMany(FamilyDetail::class);
    }

    public function educationDetails(): HasMany
    {
        return $this->hasMany(educationDetail::class);
    }

    public function professionalDetails(): HasMany
    {
        return $this->hasMany(ProfessionalDetail::class);
    }

    public function officeworkDetails(): HasOne
    {
        return $this->hasOne(Office_useDetail::class, 'candidate_id')->latestOfMany();
    }
}
