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

        return view('admin.dashboard', compact('candidates', 'total_candi', 'total_pendings', 'total_selections', 'total_rejections'));
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
}
