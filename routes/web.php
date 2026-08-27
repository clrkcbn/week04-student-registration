<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/students');

Route::controller(StudentController::class)->group(function () {
    Route::get('/students', 'index')->name('students.index');
    Route::get('/students/register', 'create')->name('students.create');
    Route::post('/students', 'store')->name('students.store');
    Route::get('/students/{student}', 'show')->name('students.show');
});
