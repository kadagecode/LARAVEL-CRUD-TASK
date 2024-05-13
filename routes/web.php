<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return redirect()->route('students.list');
});

// new registration form open
Route::get('students/register', [StudentController::class, 'registerform'])->name('students.register');
// store the student registered data
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Route for displaying the form to create a new student or list of student who registerd
Route::get('/students/list', [StudentController::class, 'list'])->name('students.list');


// Route for editing a student
Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

// Route for deleting a student
Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

//Route for student edited data for updated
Route::post('students/{id}', [StudentController::class, 'update'])->name('students.update');


//search and sort route
Route::get('student/searchsort' , [StudentController::class , 'searchsortlist'])->name('students.searchsort');