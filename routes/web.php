<?php

use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth.custom');

Route::middleware('auth.custom')->group(function () {
    Route::resource('hospitals', HospitalController::class);
    Route::resource('patients', PatientController::class);

    Route::get('patients/filter/{rs_id}', [PatientController::class, 'filterByHospital']);
});
