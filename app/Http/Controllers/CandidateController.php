<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\educationDetail;
use App\Models\FamilyDetail;
use App\Models\Office_useDetail;
use App\Models\ProfessionalDetail;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'passport' => 'required|mimes:jpg,jpeg,png|max:2048',
            'resume' => 'required|mimes:pdf|max:2048',
            'aadhar' => 'required|mimes:jpg,jpeg,pdf|max:2048',
            'degree' => 'required|mimes:jpg,jpeg,pdf|max:2048',
            'passbook' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
        ]);
        $candidate = Candidate::create([
            'full_name' => $request->candidate_name,
            'email' => $request->email,
            'contact_no' => $request->mobile,
            'alternate_contact' => $request->alt_mobile,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'city' => $request->city,
            'state' => $request->state,
            'pincode' => $request->pincode,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'marital_status' => $request->marrital_status,
            'permanent_address' => $request->permanent_address,
            'current_address' => $request->current_address,
            'applicant_designation' => $request->designation,
            'reference_name' => $request->refrence,
            'platform_name' => $request->platforms,
            'skills' => $request->skills,
            'resume' => $request->file('resume')?->store('documents', 'public'),
            'aadhar_card' => $request->file('aadhar')?->store('documents', 'public'),
            'passport_photo' => $request->file('passport')?->store('documents', 'public'),
            'degree_certificate' => $request->file('degree')?->store('documents', 'public'),
            'passbook' => $request->file('passbook')?->store('documents', 'public'),
            'current_salary' => $request->last_salary,
            'expected_salary' => $request->expected_salary,
            'total_experience' => $request->total_experience,
            'notice_period' => $request->notice_period,
        ]);

        foreach ($request->family_name as $key => $name) {
            FamilyDetail::create([
                'candidate_id' => $candidate->id,
                'member_name' => $name,
                'relationship' => $request->relation[$key],
                'mobile' => $request->family_mobile[$key],
                'occupation' => $request->occupation[$key],
                'age' => $request->age[$key],
            ]);
        }

        foreach ($request->qualification as $key => $quali) {
            educationDetail::create([
                'candidate_id' => $candidate->id,
                'qualification' => $quali,
                'college_university' => $request->college[$key],
                'passing_year' => $request->passing_year[$key],
                'percentage_cgpa' => $request->percentage[$key],
            ]);
        }

        foreach ($request->company as $key => $comp) {
            ProfessionalDetail::create([
                'candidate_id' => $candidate->id,
                'company_name' => $comp,
                'designation' => $request->pro_designation[$key],
                'salary_ctc' => $request->salary[$key],
                'currently_working' => $request->curr_working[$key],
                'working_start_date' => $request->sart_time[$key],
                'working_end_date' => $request->end_time[$key],
            ]);
        }

        return back()->with('success', 'Application submitted successfully');
    }
}
