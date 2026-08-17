<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Office\OfficeworkController;
use App\Http\Controllers\Admin\AdminAuthController;

Route::get('/', function () {
    return view('index');
})->name('form');

Route::post('/Applicant_details', [CandidateController::class, 'store'])
    ->name('candidate.store');

// admin dashboard candidate-details office work
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');


Route::middleware('admin.auth')->group(function () {
    Route::get('/Applications', [AdminController::class, 'applications'])
        ->name('applications');

    Route::get('/Employees', [AdminController::class, 'employees'])
        ->name('employee');

    Route::get('/admin/candidate/{id}', [AdminController::class, 'showCandidate'])
        ->name('admin.candidate.show');

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    Route::get('/admin/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    Route::post('/admin/candidate/{id}/office-work', [OfficeworkController::class, 'store'])
        ->name('office.form');
});