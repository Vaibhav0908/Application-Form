<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class EmployeeContoller extends Controller
{
    public function showemployeetorecruiters($id)
    {
        $employee = Candidate::with([
            'officeworkDetails'
        ])->findOrFail($id);

        return view('employee_details', compact('employee'));
    }
}