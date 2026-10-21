<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeAuthcontroller extends Controller
{
    public function showLogin()
    {
        return view("employee.employee_login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $emp = Employee::where(
            'email',
            $credentials['email']
        )->first();

        if (
            $emp &&
            $emp->status === 'Active' &&
            $credentials['password'] === $emp->password
        ) {

            $request->session()->regenerate();

            session([
                'employee_id' => $emp->id,
                'employee_name' => $emp->name,
                'employee_email' => $emp->email,
            ]);

            return redirect()->route('employee.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid email, password, or inactive account.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $request->session()->forget([
            'employee_id',
            'employee_name',
            'employee_email',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('employee.login');
    }
}
