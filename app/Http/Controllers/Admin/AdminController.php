<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Office_useDetail;
use App\Models\RecruiterDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with([
            'familyDetails',
            'educationDetails',
            'professionalDetails',
            'officeworkDetails'
        ])->get();

        $total_candi = Candidate::count();

        $total_office_status = Office_useDetail::distinct('candidate_id')->count('candidate_id');
        $total_candidates = Candidate::count();
        $total_pendings = $total_candidates - $total_office_status;

        $total_selections = Office_useDetail::where('interview_status', 'Select')->count();
        $total_rejections = Office_useDetail::where('interview_status', 'Reject')->count();
        $total_hold = Office_useDetail::where('interview_status', 'Hold')->count();
        $total_on_board = Office_useDetail::where('interview_status', 'OnBording')->count();
        $total_virtuals = Office_useDetail::where('interview_status', 'Virtual Round')->count();
        $total_f_t_f = Office_useDetail::where('interview_status', 'Face To Face Interview')->count();
        $total_first_r = Office_useDetail::where('interview_status', 'First Round')->count();
        $total_sec_r = Office_useDetail::where('interview_status', 'Second Round')->count();
        $total_final_r = Office_useDetail::where('interview_status', 'Final Round')->count();

        return view(
            'admin.dashboard',
            compact(
                'candidates',
                'total_candi',
                'total_pendings',
                'total_selections',
                'total_rejections',
                'total_hold',
                'total_on_board',
                'total_virtuals',
                'total_f_t_f',
                'total_first_r',
                'total_sec_r',
                'total_final_r'
            )
        );
    }

    public function applications()
    {
        $candidates = Candidate::with([
            'familyDetails',
            'educationDetails',
            'professionalDetails',
            'officeworkDetails'
        ])->latest()->get();

        return view('applications', compact('candidates'));
    }

    public function showCandidate($id)
    {
        $candidate = Candidate::with([
            'familyDetails',
            'educationDetails',
            'professionalDetails',
            'officeworkDetails',
        ])->findOrFail($id);

        $recruiters = RecruiterDetail::where('status', 'Active')->get();

        return view('candidate_details', compact('candidate', 'recruiters'));
    }

    public function employees()
    {
        $employee = Candidate::with([
            'familyDetails',
            'educationDetails',
            'professionalDetails',
            'officeworkDetails'
        ])->get();

        return view('employees', compact('employee'));
    }

    public function showControl()
    {
        $recruiter = RecruiterDetail::all();

        return view('admin.control_panel', compact('recruiter'));
    }

    public function recruiter(Request $request)
    {
        $request->validate([
            'rec_name' => 'required|string|max:255',
            'rec_email' => 'required|email',
            'rec_password' => 'required',
            'rec_status' => 'required|in:Active,Deactive',
        ]);

        RecruiterDetail::updateOrCreate(
            [
                'email' => $request->rec_email,
            ],
            [
                'name' => $request->rec_name,
                'password' => $request->rec_password,
                'status' => $request->rec_status,
            ]
        );

        return redirect()->back()->with(
            'success',
            'Recruiter Data Saved Successfully.'
        );
    }
}
