<?php

use App\Models\Student;
use App\Models\Course;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


// ==================== HOME ROUTES ====================

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Hello page
Route::get('/hello', function () {
    return view('hello');
});


// ==================== STUDENT ROUTES ====================

// Display the student registration form
Route::get('/student/create', function () {
    return view('student.create');
});

// Store a new student
Route::post('/student', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);

    return "Student {$student->name} created successfully!";
});

// Display all students
Route::get('/students', function () {
    $students = Student::all();

    return view('student.index', compact('students'));
});

// Display one student's details
Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.show', compact('student'));
});

// Display the edit form
Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);

    return view('student.edit', compact('student'));
});

// Update an existing student
Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email,' . $student->id,
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);

    return redirect('/students')->with(
        'success',
        'Student updated successfully!'
    );
});

// Delete a student
Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);

    $student->delete();

    return redirect('/students')->with(
        'success',
        'Student deleted successfully!'
    );
});


// ==================== COURSE ROUTES ====================

// Display all registered courses
Route::get('/courses', function () {
    $courses = Course::all();

    return view('course.index', compact('courses'));
});

// Display the course registration form
Route::get('/courses/create', function () {
    return view('course.create');
});

// Display the course edit form
Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);

    return view('course.edit', compact('course'));
});

// Store a new course
Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'course_name' => 'required|string|max:255',
        'course_code' => 'required|string|max:50|unique:courses,course_code',
        'description' => 'nullable|string|max:1000',
    ]);

    Course::create($validated);

    return redirect('/courses')->with(
        'success',
        'Course registered successfully!'
    );
});

// Update an existing course
Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);

    $validated = $request->validate([
        'course_name' => 'required|string|max:255',
        'course_code' => 'required|string|max:50|unique:courses,course_code,' . $course->id,
        'description' => 'nullable|string|max:1000',
    ]);

    $course->update($validated);

    return redirect('/courses')->with(
        'success',
        'Course updated successfully!'
    );
});

// Delete a course
Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);

    $course->delete();

    return redirect('/courses')->with(
        'success',
        'Course deleted successfully!'
    );
});