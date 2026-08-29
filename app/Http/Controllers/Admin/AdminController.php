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

        $total_office_status = Office_useDetail::distinct('candidate_id')
            ->count('candidate_id');

        $total_adm_pendings = $total_candi - $total_office_status;

        $statuses = Interview_status::where('status', 'Active')
            ->get();

        if (session('admin_username')) {
            $statusCounts = Office_useDetail::selectRaw(
                'interview_status, COUNT(DISTINCT candidate_id) as total'
            )
                ->groupBy('interview_status')
                ->pluck('total', 'interview_status');
        } else {
            $statusCounts = collect();
        }

        return view(
            'admin.dashboard',
            compact(
                'candidates',
                'total_candi',
                'total_office_status',
                'total_adm_pendings',
                'statuses',
                'statusCounts'
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
                'email' => $request->rec_email,
            ]
        );

        return redirect(route('control_panel'))->with(
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
                'id' => $request->id,
            ],
            [
                'nation' => $request->nat_name,
                'status' => $request->nat_status,
            ]
        );

        return redirect(route('control_panel'))->with(
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
                'id' => $request->id,
            ],
            [
                'platform_name' => $request->plat_name,
                'status' => $request->plat_status,
            ]
        );

        return redirect(route('control_panel'))->with(
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
                'id' => $request->id,
            ],
            [
                'interview_status' => $request->inter_name,
                'status' => $request->inter_status,
            ]
        );

        return redirect(route('control_panel'))->with(
            'success',
            'Interview Status Data Saved Successfully.'
        );
    }
}
