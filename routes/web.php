<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Office\OfficeworkController;

Route::get('/', function () {
    return view('index');
})->name('form');

Route::post('/Applicant_details', [CandidateController::class, 'store'])
    ->name('candidate.store');

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin');

Route::get('/admin/candidate/{id}', [AdminController::class, 'showCandidate'])
    ->name('admin.candidate.show');

Route::post('/admin/candidate/{id}/office-work', [OfficeworkController::class, 'store'])
    ->name('office.form');