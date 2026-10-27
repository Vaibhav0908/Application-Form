<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('admin_id') && request()->routeIs('admin.dashboard')) {
            return redirect()->route('admin.login');
        } elseif (!session()->has('recruiter_id') && request()->routeIs('recruiters.dashboard')) {
            return redirect()->route('recruiter.login');
        } elseif (!session()->has('employee_id') && request()->routeIs('employee.dashboard')) {
            return redirect()->route('employee.login');
        }

        return $next($request);
    }
}