<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use App\Models\Office_useDetail;
use App\Models\Candidate;
use Illuminate\Http\Request;

class OfficeworkController extends Controller
{
    public function store(Request $request, $id)
    {
        $candidate = Candidate::findOrFail($id);
        Office_useDetail::create([
            'candidate_id' => $candidate->id,
            'experience_rating' => $request->experience_rating,
            'communication_skills' => $request->communication_skill,
            'computer_skills' => $request->computer_skill,
            'interpersonal_skills' => $request->interpersonal_skill,
            'learning_ability' => $request->learning_ability,
            'presentation_skills' => $request->presentation_skill,
            'technical_skills' => $request->technical_skill,
            'attitude' => $request->attitude,
            'confidence' => $request->confidence,
            'interview_remarks' => $request->interview_remarks,
            'salary_offered' => $request->salary_offered,
            'interview_date' => $request->interview_date,
            'interview_status' => $request->interview_status,
            'interviewed_by' => $request->interview_by,
        ]);
        return redirect()
            ->back()
            ->with('success', 'Office evaluation saved successfully.');
    }
}
