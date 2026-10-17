<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Office\OfficeworkController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Employee\EmployeeContoller;
use App\Http\Controllers\Recruiter\RecruiterAuthController;
use App\Http\Controllers\Recruiter\recruiterController;
use App\Http\Controllers\ResumeChecker\ResumeController;
use App\Models\Employee;
use App\Models\Interview_status;
use App\Models\Nation;
use App\Models\Platform;
use App\Models\RecruiterDetail;
use Illuminate\Http\Request;

Route::get('/', function () {
    $recruiters = RecruiterDetail::where('status', 'Active')->get();
    $platforms = Platform::where('status', "Active")->get();
    $nations = Nation::where('status', "Active")->get();
    return view('index', compact('recruiters', 'platforms', 'nations'));
})->name('form');


Route::post('/Applicant_details', [CandidateController::class, 'store'])
    ->name('candidate.store');

// admin login logout
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

// recruiter login logout
Route::get('/recruiters/login', [RecruiterAuthController::class, 'showLogin'])
    ->name('recruiter.login');

Route::post('/recruiters/login', [RecruiterAuthController::class, 'login'])
    ->name('recruiter.login.submit');


// admin dashboard candidate-details office work
Route::middleware('admin.auth')->group(function () {
    Route::get('/Applications', [AdminController::class, 'applications'])
        ->name('applications');

    Route::get('/resume_checker', [ResumeController::class, 'resume_checker'])
        ->name('resume_checker');

    Route::post('/resume_check', [ResumeController::class, 'resume_submission'])
        ->name('resume_check');

    Route::get('/Employees', [EmployeeContoller::class, 'employees'])
        ->name('employee');

    Route::post('/add_employee', [EmployeeContoller::class, 'addemployee'])
        ->name('addemployee');

    Route::get('/employee/edit/panel/{id}', function ($id) {
        $employee = Employee::findOrFail($id);
        return view('employee.employee_edit', compact('employee'));
    })->name('employee.edit_panel');

    Route::post('/employee/edit_submit', [EmployeeContoller::class, 'addemployee'])
        ->name('employee.edit_submit');

    Route::get('/options_control_panel', [AdminController::class, 'showControl'])
        ->name('options_control_panel');

    Route::post('/recruiter', [recruiterController::class, 'recruiter'])
        ->name('recruiter_save');

    Route::post('/nation', [AdminController::class, 'nation'])
        ->name('nation_save');

    Route::post('/platform', [AdminController::class, 'platform'])
        ->name('platform_save');

    Route::post('/interview_status', [AdminController::class, 'inter_status'])
        ->name('inter_status_save');

    Route::post('/admin/edit', [AdminController::class, 'profile_edit'])
        ->name('admin_profile_edit');

    Route::get('/admin/candidate/{id}', [AdminController::class, 'showCandidate'])
        ->name('admin.candidate.show');

    Route::get('/employee_details/{id}', [EmployeeContoller::class, 'showemployeedetails'])
    ->name('employee_details');


    Route::get('/employee/delete/{id}', function ($id) {
            Employee::where('id', $id)->delete();
            return redirect(route('employee'))->with(
                'success',
                'Employee Data Deleted Successfully.'
            );
        }
    )->name('employee.delete');


    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/recruiter_control_panel', [recruiterController::class, 'showrecruiterControl'])
        ->name('recruiter_control_panel');

    Route::get('/recruiters/dashboard', [recruiterController::class, 'dashboard'])
        ->name('recruiters.dashboard');

    Route::get('/task_management_panel', function(){
        return view('admin.task_panel');
    })->name('task_management_panel');

    Route::get('/leaves_management_panel', function(){
        return view('admin.leaves_panel');
    })->name('leaves_management_panel');

    Route::get('/recruiters/edit/panel/{id}', function ($id) {
        $recruiter = RecruiterDetail::findOrFail($id);
        return view('recruiters.recruiters_edit', compact('recruiter'));
    })->name('recruiters.edit_panel');


    Route::post('/recruiters/edit_submit', [recruiterController::class, 'recruiter'])
        ->name('recruiters.edit_submit');


    Route::get('/recruiters/delete/{id}', function ($id) {
            RecruiterDetail::where('id', $id)->delete();
            return redirect(route('recruiter_control_panel'))->with(
                'success',
                'Recruiter Data Deleted Successfully.'
            );
        }
    )->name('recruiters.delete');


    Route::get('/option/edit/panel/{type}/{id}', function ($type, $id) {
        if ($type == 'platform') {
            $platform = Platform::findOrFail($id);
            return view('admin.options_edit', compact('platform'));
        }

        if ($type == 'nation') {
            $nation = Nation::findOrFail($id);
            return view('admin.options_edit', compact('nation'));
        }
        if ($type == 'int_status') {
            $int_status = Interview_status::findOrFail($id);
            return view('admin.options_edit', compact('int_status'));
        }
    })->name('option.edit_panel');

    Route::post('/platform/edit_submit', [AdminController::class, 'platform'])
        ->name('platform.edit_submit');

    Route::post('/nation/edit_submit', [AdminController::class, 'nation'])
        ->name('nation.edit_submit');



    Route::get('/option/delete/{type}/{id}', function ($type, $id) {
        if ($type == 'platform') {
            Platform::where('id', $id)->delete();
            return redirect(route('options_control_panel'))->with(
                'success',
                'Platform Deleted Successfully.'
            );
        }
        if ($type == 'nation') {
            Nation::where('id', $id)->delete();
            return redirect(route('options_control_panel'))->with(
                'success',
                'Nation Deleted Successfully.'
            );
        }
        if ($type == 'int_status') {
            Interview_status::where('id', $id)->delete();
            return redirect(route('options_control_panel'))->with(
                'success',
                'Interview Status Deleted Successfully.'
            );
        }
    })->name('option.delete');


    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');


    Route::get('/recruiter/logout', [RecruiterAuthController::class, 'logout'])
        ->name('recruiter.logout');


    Route::post('/admin/candidate/{id}/office-work', [OfficeworkController::class, 'store'])
        ->name('office.form');



    Route::post('/recruiter/heartbeat', function (Request $request) {
        if (session()->has('recruiter_id')) {
            $recruiter = RecruiterDetail::find(session('recruiter_id'));
            if ($recruiter) {
                $recruiter->withoutTimestamps(function () use ($recruiter) {
                    $recruiter->update([
                        'last_seen' => now(),
                    ]);
                });
            }
        }
    })->name('recruiter.heartbeat');

});