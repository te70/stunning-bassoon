<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\MileageController;
use App\Http\Controllers\userController;

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
        Route::delete('/travel/delete/{id}', 'destroy')->name('travel.delete');
    });

    Route::controller(MileageController::class)->group(function (){
        Route::get('/mileage', 'index');
        Route::get('/mileage/create', 'create');
        Route::post('/mileage/store', 'store');
        Route::get('/mileage/edit/{id}', 'edit')->name('mileage.edit');
        Route::put('/mileage/update/{id}', 'update')->name('mileage.update');
        Route::delete('/mileage/delete/{id}', 'destroy')->name('mileage.delete');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index');
        Route::get('/user/create', 'create')->name('user.create');
        Route::post('/user/store', 'store')->name('user.store'); 
        Route::get('/user/edit/{id}', 'edit')->name('user.edit');
        Route::post('/user/update/{id}', 'update')->name('user.update');
        Route::delete('/user/delete/{id}', 'destroy')->name('user.delete');
    });
});

require __DIR__.'/auth.php';
