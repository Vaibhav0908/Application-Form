<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Employee;
use App\Models\Leaves;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\Shared\Validate;

class EmployeeContoller extends Controller
{
    public function dashboard()
    {
        $emp = Candidate::all();
        return view(
            "admin.dashboard",
            compact('emp')
        );
    }

    public function showleavespanel()
    {
        $emp = Candidate::all();
        $employee = Employee::all();
        $leave = Leaves::all();
        return view("employee.employee_leaves", compact(
            'emp',
            'employee',
            'leave'
        ));
    }

    public function employee_panel()
    {
        $emp = Candidate::all();
        $employee = Employee::all();
        return view('employee.employee_panel', compact('emp', 'employee'));
    }

    public function add_documents(Request $request)
    {
        $request->validate([
            'resume' => 'nullable|mimes:pdf|max:2048',
            'passport' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
            'aadhar' => 'nullable|mimes:pdf|max:2048',
            'degree' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
            'passbook' => 'nullable|mimes:jpg,jpeg,pdf|max:2048',
        ]);

        // Find the candidate record
        $candidate = Candidate::find($request->id);

        if (!$candidate) {
            return back()->with('error', 'Candidate not found.');
        }

        $data = [];

        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('documents', 'public');
        }

        if ($request->hasFile('aadhar')) {
            $data['aadhar_card'] = $request->file('aadhar')->store('documents', 'public');
        }

        if ($request->hasFile('passport')) {
            $data['passport_photo'] = $request->file('passport')->store('documents', 'public');
        }

        if ($request->hasFile('degree')) {
            $data['degree_certificate'] = $request->file('degree')->store('documents', 'public');
        }

        if ($request->hasFile('passbook')) {
            $data['passbook'] = $request->file('passbook')->store('documents', 'public');
        }

        $candidate->update($data);

        return redirect()->route('employee_panel')->with(
            'success',
            'Document Saved Successfully.'
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

    public function applyleave(Request $request)
    {
        Leaves::Create(
            [
                'name' => $request->emp_name,
                'employee_id' => $request->emp_id,
                'designation' => $request->emp_designation,
                'department' => $request->emp_department,
                'leave_type' => $request->leave_type,
                'days' => $request->days,
                'half_day_date' => $request->half_day_date,
                'full_day_date' => $request->full_day_date,
                'paid_day_date' => $request->paid_day_date,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'time' => $request->time,
                'reason' => $request->reason,
            ]
        );

        return redirect(route('employee.leaves'))->with(
            'success',
            'Application send Successfully.'
        );
    }

}