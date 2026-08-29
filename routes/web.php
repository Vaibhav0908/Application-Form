<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Office\OfficeworkController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Recruiter\RecruiterAuthController;
use App\Http\Controllers\Recruiter\recruiterController;
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
Route::get('/recruiters/login', [RecruiterAuthController::class, 'showLogin'])
    ->name('recruiter.login');

Route::post('/recruiters/login', [RecruiterAuthController::class, 'login'])
    ->name('recruiter.login.submit');


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

    Route::get('/recruiters/dashboard', [recruiterController::class, 'dashboard'])
        ->name('recruiters.dashboard');

    Route::get('/recruiters/edit/panel/{id}', function ($id) {
        $recruiter = RecruiterDetail::findOrFail($id);
        return view('recruiters.recruiters_edit', compact('recruiter'));
    })->name('recruiters.edit_panel');

    Route::post('/recruiters/edit_submit', [AdminController::class, 'recruiter'])
        ->name('recruiters.edit_submit');

    Route::get(
        '/recruiters/delete/{id}',
        function ($id) {
            RecruiterDetail::where('id', $id)->delete();
            return redirect(route('control_panel'))->with(
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
            return redirect(route('control_panel'))->with(
                'success',
                'Platform Deleted Successfully.'
            );
        }
        if ($type == 'nation') {
            Nation::where('id', $id)->delete();
            return redirect(route('control_panel'))->with(
                'success',
                'Nation Deleted Successfully.'
            );
        }
        if ($type == 'int_status') {
            Interview_status::where('id', $id)->delete();
            return redirect(route('control_panel'))->with(
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
});