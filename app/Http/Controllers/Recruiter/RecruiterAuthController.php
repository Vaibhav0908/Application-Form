<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\RecruiterDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RecruiterAuthController extends Controller
{
    public function showLogin()
    {
        return view('recruiters.recruiter-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $recruiter = RecruiterDetail::where(
            'email',
            $credentials['email']
        )->first();

        if (
            $recruiter &&
            $recruiter->status === 'Active' &&
            $credentials['password'] === $recruiter->password
        ) {

            $request->session()->regenerate();

            session([
                'recruiter_id' => $recruiter->id,
                'recruiter_name' => $recruiter->name,
                'recruiter_email' => $recruiter->email,
            ]);

            app(\App\Services\AttendanceService::class)
                ->recordLogin(
                    $recruiter->id,
                    'recruiter',
                    $recruiter->name
                );

            return redirect()->route('recruiters.dashboard');
        }

        return back()
            ->withErrors([
                'email' => 'Invalid email, password, or inactive account.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        $recruiterId = session('recruiter_id');

        if ($recruiterId && $request->routeIs('recruiter.logout')) {
            app(\App\Services\AttendanceService::class)
                ->recordLogout($recruiterId, 'recruiter');
        }

        $request->session()->forget([
            'recruiter_id',
            'recruiter_name',
            'recruiter_email',
        ]);

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('recruiter.login');
    }
}