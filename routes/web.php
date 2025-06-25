<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us');

Route::post('/contact-submit', [ContactMessageController::class, 'submit'])->name('contact.submit');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/submit-form/{job}', [ApplicationController::class, 'showForm'])->name('application.form');
Route::post('/submit-form', [ApplicationController::class, 'store'])->name('application.submit');


// Authenticated routes
Route::middleware('guest')->group(function () {

    // login 
    Route::get('/login', [AuthController::class, 'view'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // register
    Route::get('/register', function () {
        return view('register');
    })->name('register');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


    Route::get('/submit-form', function () {
        return view('upload-resume');
    })->name('submit-form');

    Route::get('/submitted', function () {
        return view('submitted');
    })->name('submitted');

    // logout 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->name('admin.')->group(function () {
    // dashboard 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/jobs-admin', [DashboardController::class, 'jobsAdmin'])->name('jobs-admin');
    Route::resource('tag', TagController::class);
    Route::resource('internship', InternshipController::class);
    Route::resource('job', JobController::class);
    Route::resource('training', TrainingController::class);
    Route::get('/messages', [ContactMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [ContactMessageController::class, 'show'])->name('messages.show');
    // routes/web.php
    Route::get('/applicants/{status?}', [ApplicationController::class, 'index'])->name('applicant');
    Route::patch('/applicant/{id}/update-status', [ApplicationController::class, 'updateStatus'])->name('applicant.updateStatus');
    Route::get('/applicant/{id}', [ApplicationController::class, 'show'])->name('applicant.show');



    // Route::get('/applicant', [ApplicationController::class, 'index'])->name('applicant');

    // Job Opportunities management
    Route::get('/post-submitted', [DashboardController::class, 'postSubmitted'])->name('post-submitted');
});
