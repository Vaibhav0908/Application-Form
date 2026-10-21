<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeContoller extends Controller
{
    public function dashboard(){
        $emp = Candidate::all();
        return view("admin.dashboard"
        , compact('emp')
        );
    }

    public function showleavesform(){
        $emp = Candidate::all();
        $employee = Employee::all();
        return view("employee.employee_leaves"
        , compact('emp', 'employee')
        );
    }

    public function employees()
    {
        $employee = Employee::with([
            'candidate.officeworkDetails'
        ])->get();
        return view('employee.employees', compact('employee'));
    }

    public function showemployeedetails($id)
    {
        $emp = Employee::findOrFail($id);
        $can = Candidate::findOrFail($emp->candidate_id);
        return view('employee.employee_details', compact('emp', 'can'));
    }

    public function addemployee(Request $request)
    {
        $request->validate([
            'emp_email' => 'required|email',
            'emp_calender' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
        ]);

        Employee::updateOrCreate(
            [
                'email' => $request->emp_email,
            ],
            [
                'name' => $request->emp_name,
                'candidate_id' => $request->candidate_id,
                'password' => $request->emp_password,
                'status' => $request->emp_status,
                'email' => $request->emp_email,
                'designation' => $request->emp_designation,
                'department' => $request->emp_department,
                'salary' => $request->emp_salary,
                'joing_date' => $request->emp_joining,
                'calender' => $request->file('emp_calender')?->store('documents', 'public'),
            ]
        );

        return redirect(route('employee'))->with(
            'success',
            'Employee Data Saved Successfully.'
        );
    }
}