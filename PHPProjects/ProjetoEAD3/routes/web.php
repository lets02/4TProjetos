<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas de autenticação
Auth::routes();

// Página principal após o login
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard para professores (somente para usuários autenticados)
Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard')->middleware('auth');

// Dashboard para alunos (somente para usuários autenticados)
Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard')->middleware('auth');

// Rotas para cursos (somente para usuários autenticados)
Route::resource('courses', CourseController::class)->middleware('auth');

// Rota para inscrição em cursos (somente para usuários autenticados)
Route::post('/courses/{course}/enroll', [EnrollmentController::class, 'store'])->middleware('auth')->name('courses.enroll');
