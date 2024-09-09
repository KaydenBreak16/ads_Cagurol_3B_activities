<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student; // Include your Student model
use App\Models\Course; // Include your Course model

// Route to create a new student
Route::get('/students/create', function () {
    $student = new Student(); // Create a new student instance
    $student->first_name = 'John'; // Set the first name
    $student->last_name = 'Doe'; // Set the last name
    $student->email = 'johndoe@example.com'; // Set the email
    $student->save(); // Save the student to the database
    return 'Student created!';
});

// Route to get all students
Route::get('/students', function () {
    $students = Student::all(); // Retrieve all students
    return $students;
});

// Route to update a student
Route::get('/students/update', function () {
    $student = Student::where('email', 'johndoe@example.com')->first(); // Find student by email
    if ($student) {
        $student->first_name = 'Jane'; // Update the first name
        $student->save(); // Save the updated student
        return 'Student updated!';
    } else {
        return 'Student not found.';
    }
});

// Route to delete a student
Route::get('/students/delete', function () {
    $student = Student::where('email', 'johndoe@example.com')->first(); // Find student by email
    if ($student) {
        $student->delete(); // Delete the student
        return 'Student deleted!';
    } else {
        return 'Student not found.';
    }
});

// Route to create a new course
Route::get('/courses/create', function () {
    $course = new Course(); // Create a new course instance
    $course->course_name = 'Introduction to Databases'; // Set the course name
    $course->save(); // Save the course to the database
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
