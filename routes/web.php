<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student; // Include your Student model
use App\Models\Course; // Include your Course model

// Route to create a new student
Route::get('/students/create', function () {
    $student = new Student(); 
    $student->first_name = 'John';
    $student->last_name = 'Doe'; 
    $student->email = 'johndoe@example.com'; 
    $student->age = 22;
    return 'Student created!';
});

// Route to get all students
Route::get('/students', function () {
    $students = Student::all(); // Retrieve all students
    return $students;
});

// Route to update a student
Route::get('/students/update', function () {
    $student = Student::where('email', 'johndoe@example.com')->first(); 
    if ($student) {
        $student->first_name = 'Jane'; 
        $student->save(); // 
        return 'Student updated!';
    } else {
        return 'Student not found.';
    }
});

// Route to delete a student
Route::get('/students/delete', function () {
    $student = Student::where('email', 'johndoe@example.com')->first(); 
    if ($student) {
        $student->delete(); 
        return 'Student deleted!';
    } else {
        return 'Student not found.';
    }
});

// Route to create a new course
Route::get('/courses/create', function () {
    $course = new Course(); 
    $course->course_name = 'Introduction to Databases'; 
    $course->save(); 
    return 'Course created!';
});

// Default route to return the welcome view
Route::get('/', function () {
    return view('welcome');
});

Route::get('/course/{id}/students', function ($id){
    $course = Course::find($id);
    return $course->student;
});
