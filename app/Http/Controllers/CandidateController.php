<?php

namespace App\Http\Controllers;
use App\Models\Candidate;
use App\Models\educationDetail;
use App\Models\FamilyDetail;
use App\Models\ProfessionalDetail;
use App\Models\RecruiterDetail;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(
            [
                'passport' => 'required|mimes:jpg,jpeg,png|max:2048',
                'resume' => 'required|mimes:pdf|max:2048',
                'aadhar' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
                'degree' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
                'passbook' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
                'email' => 'required|email|unique:candidates,email',
            ],
            [
                'email.unique' => 'This email is already used.',
            ]
        );
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
                'relationship' => $request->relation[$key] ?? null,
                'mobile' => $request->family_mobile[$key] ?? null,
                'occupation' => $request->occupation[$key] ?? null,
                'age' => $request->age[$key],
            ]);
        }

        foreach ($request->qualification as $key => $quali) {
            educationDetail::create([
                'candidate_id' => $candidate->id,
                'qualification' => $quali,
                'college_university' => $request->college[$key] ?? null,
                'passing_year' => $request->passing_year[$key] ?? null,
                'percentage_cgpa' => $request->percentage[$key] ?? null,
            ]);
        }

        foreach ($request->company as $key => $comp) {
            ProfessionalDetail::create([
                'candidate_id' => $candidate->id,
                'company_name' => $comp,
                'designation' => $request->pro_designation[$key] ?? null,
                'salary_ctc' => $request->salary[$key] ?? null,
                'currently_working' => $request->curr_working[$key] ?? null,
                'working_start_date' => $request->sart_time[$key] ?? null,
                'working_end_date' => $request->end_time[$key] ?? null,
            ]);
        }

        return back()->with('success', 'Application submitted successfully');
    }
}
