<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyDetail extends Model
{
    protected $fillable = [
        'candidate_id',
        'member_name',
        'relationship',
        'mobile',
        'occupation',
        'age',
    ];
}
