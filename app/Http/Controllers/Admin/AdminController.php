<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Office_useDetail;
use Illuminate\Http\Request;

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

        $total_pendings = Office_useDetail::where('interview_status', 'Pending')->count();
        $total_selections = Office_useDetail::where('interview_status', 'Select')->count();
        $total_rejections = Office_useDetail::where('interview_status', 'Reject')->count();
        $total_hold = Office_useDetail::where('interview_status', 'Hold')->count();
        $total_on_board = Office_useDetail::where('interview_status', 'OnBording')->count();
        $total_virtuals = Office_useDetail::where('interview_status', 'Virtual Round')->count();
        $total_f_t_f = Office_useDetail::where('interview_status', 'Face To Face Interview')->count();
        $total_first_r = Office_useDetail::where('interview_status', 'First Round')->count();
        $total_sec_r = Office_useDetail::where('interview_status', 'Second Round')->count();
        $total_final_r = Office_useDetail::where('interview_status', 'Final Round')->count();

        return view('admin.dashboard', 
        compact('candidates', 'total_candi', 'total_pendings', 'total_selections', 'total_rejections', 'total_hold', 
        'total_on_board', 'total_virtuals', 'total_f_t_f', 'total_first_r', 'total_sec_r', 'total_final_r'));
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
            'officeworkDetails'
        ])->findOrFail($id);

        return view('candidate_details', compact('candidate'));
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
}
