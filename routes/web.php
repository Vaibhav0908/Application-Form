<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Office\OfficeworkController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Models\Interview_status;
use App\Models\Nation;
use App\Models\Platform;
use App\Models\RecruiterDetail;

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
Route::get('/recruiters/login', function () {
    return view('recruiters.login');
})->name('recruiter.login');

// admin dashboard candidate-details office work
Route::middleware('admin.auth')->group(function () {
    Route::get('/Applications', [AdminController::class, 'applications'])
        ->name('applications');

    Route::get('/Employees', [AdminController::class, 'employees'])
        ->name('employee');

    Route::get('/control_panel', [AdminController::class, 'showControl'])
        ->name('control_panel');

    Route::post('/recruiter', [AdminController::class, 'recruiter'])
        ->name('recruiter_save');

    Route::post('/nation', [AdminController::class, 'nation'])
        ->name('nation_save');

    Route::post('/platform', [AdminController::class, 'platform'])
        ->name('platform_save');

    Route::post('/interview_status', [AdminController::class, 'inter_status'])
        ->name('inter_status_save');

    Route::get('/admin/candidate/{id}', [AdminController::class, 'showCandidate'])
        ->name('admin.candidate.show');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    Route::post('/admin/candidate/{id}/office-work', [OfficeworkController::class, 'store'])
        ->name('office.form');
});