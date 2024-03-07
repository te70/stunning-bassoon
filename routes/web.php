<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TravelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(StudentController::class)->group(function () {
        Route::get('/student', 'index');
        Route::get('/student/create', 'create');
        Route::post('/student/store', 'store');
        Route::get('/student/edit/{id}', 'edit')->name('student.edit');
        Route::put('/student/update/{id}', 'update')->name('student.update');
        Route::delete('/student/delete/{id}', 'destroy')->name('student.delete');
    });

    Route::controller(TravelController::class)->group(function (){
        Route::get('/check', 'index')->name('check.index');
        Route::post('/check/store', 'store');
        Route::get('/travel', 'travel');
    });
});

require __DIR__.'/auth.php';
