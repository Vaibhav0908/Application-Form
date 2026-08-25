<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Interview_status;
use App\Models\Nation;
use App\Models\Office_useDetail;
use App\Models\Platform;
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
        $interview_status = Interview_status::where('status', 'Active')->get();

        return view('candidate_details', compact('candidate', 'recruiters', 'interview_status'));
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
        $platforms = Platform::all();
        $nations = Nation::all();
        $interview_status = Interview_status::all();

        return view('admin.control_panel', compact('recruiter', 'platforms', 'nations', 'interview_status'));
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

    public function nation(Request $request)
    {
        $request->validate([
            'nat_name' => 'required|string|max:255',
            'nat_status' => 'required|in:Active,Deactive',
        ]);

        Nation::updateOrCreate(
            [
                'id' => $request->id ?: null,
            ],
            [
                'nation' => $request->nat_name,
                'status' => $request->nat_status,
            ]
        );

        return redirect()->back()->with(
            'success',
            'Nation Data Saved Successfully.'
        );
    }

    public function platform(Request $request)
    {
        $request->validate([
            'plat_name' => 'required|string|max:255',
            'plat_status' => 'required|in:Active,Deactive',
        ]);

        Platform::updateOrCreate(
            [
                'id' => $request->id ?: null,
            ],
            [
                'platform_name' => $request->plat_name,
                'status' => $request->plat_status,
            ]
        );

        return redirect()->back()->with(
            'success',
            'Platform Data Saved Successfully.'
        );
    }

    public function inter_status(Request $request)
    {
        $request->validate([
            'inter_name' => 'required|string|max:255',
            'inter_status' => 'required|in:Active,Deactive',
        ]);

        Interview_status::updateOrCreate(
            [
                'id' => $request->id ?: null,
            ],
            [
                'interview_status' => $request->inter_name,
                'status' => $request->inter_status,
            ]
        );

        return redirect()->back()->with(
            'success',
            'Interview Status Data Saved Successfully.'
        );
    }
}
