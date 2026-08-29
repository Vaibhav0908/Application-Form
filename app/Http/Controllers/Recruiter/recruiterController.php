<?php

namespace App\Http\Controllers\Recruiter;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Interview_status;
use App\Models\Nation;
use App\Models\Office_useDetail;
use App\Models\Platform;
use App\Models\RecruiterDetail;
use Illuminate\Http\Request;

class recruiterController extends Controller
{
    public function dashboard()
    {
        $candidates = Candidate::with([
            'familyDetails',
            'educationDetails',
            'professionalDetails',
            'officeworkDetails'
        ])->get();

        $statuses = Interview_status::where('status', 'Active')
            ->get();


        $recruiterName = session('recruiter_name');

        $total_rec_appl = 0;
        $total_rec_pendings = 0;

        if ($recruiterName) {
            $recruiterCandidates = Candidate::where(function ($query) use ($recruiterName) {

                // Candidate directly referred by recruiter
                $query->where(function ($q) use ($recruiterName) {

                    $q->where('reference_name', $recruiterName);

                })

                    // Candidate has NA reference,
                    // so check interviewer
                    ->orWhere(function ($q) use ($recruiterName) {

                        $q->where('reference_name', 'NA')
                            ->whereHas('officeworkDetails', function ($office) use ($recruiterName) {

                                $office->where(
                                    'interviewed_by',
                                    $recruiterName
                                );
                            });
                    });

            })->pluck('id');


            // Total recruiter applications

            $total_rec_appl = $recruiterCandidates->count();


            // Recruiter's candidates that have office evaluation

            $total_rec_office_status = Office_useDetail::whereIn(
                'candidate_id',
                $recruiterCandidates
            )
                ->distinct('candidate_id')
                ->count('candidate_id');


            // Recruiter's pending applications

            $total_rec_pendings = $total_rec_appl - $total_rec_office_status;
        }

        // STATUS COUNTS

        if ($recruiterName) {
            // Recruiter sees only their candidates' status counts

            $statusCounts = Office_useDetail::whereIn(
                'candidate_id',
                $recruiterCandidates
            )
                ->selectRaw(
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
                'total_rec_appl',
                'total_rec_pendings',
                'statuses',
                'statusCounts'
            )
        );
    }
}
