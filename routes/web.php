<?php

use App\Http\Controllers\AcademicSemesterController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CandidateVerificationController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentRegistrationController;
use App\Http\Controllers\StudyProgramController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ForgotPassword;
use App\Http\Controllers\DashboardDaftar;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DegreeLevelController;
use App\Http\Controllers\LecturerWeeklyScheduleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\StudentRegistrationProgramController;
use App\Http\Controllers\StudentWeeklyScheduleController;
use App\Http\Controllers\WeeklyScheduleController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/prg', function () {
    return view('prg');
})->name('prg');

Route::get('/fk', function () {
    return view('fk');
})->name('fk');
// Bisa di isi dengan halaman HOMEPAGE


// Rute menuju ke halaman LOGIN melalui Controller
Route::get('/login', [LoginController::class, 'index'])->name('auth.login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/forgotpassword', [ForgotPassword::class, 'index'])->name('auth.forgot-password')->middleware('guest');
Route::post('/forgotpassword', [ForgotPassword::class, 'resetpasswordrequest'])->name('auth.password.email')->middleware('guest');

Route::get('/reset-password/{token}', [ResetPassword::class, 'resetpassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [ResetPassword::class, 'storepassword'])->middleware('guest')->name('password.update');

// Rute Menuju ke halaman DAFTAR melalui Controller
Route::get('/daftar', [RegisterController::class, 'index'])->middleware('guest');

// Rute request ketika user memasukan data validasi
Route::post('/daftar', [RegisterController::class, 'store']);

// Rute unutuk menuju Dashboard melalui Contorller
Route::get('/dashboard/home', [DashboardController::class, 'index'])->name('dashboard.home')->middleware('auth');

// Rute untuk menuju Dashboard-Daftar mellaui Controller
Route::get('/dashboard/student-profile', [StudentProfileController::class, 'index'])->name('dashboard.student-profile')->middleware('auth');
Route::post('/dashboard/save-student-candidate', [StudentProfileController::class, 'saveStudentCandidateTemp'])->name('dashboard.saveStudentCandidate')->middleware('auth');

Route::get('/dashboard/student-registration', [StudentRegistrationProgramController::class, 'create'])->name('dashboard.student-registration')->middleware('auth');
Route::post('/dashboard/student-registration', [StudentRegistrationProgramController::class, 'store'])->name('dashboard.student-registration.store')->middleware('auth');

// // Admin route
Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware('auth')
    ->group(function () {
        Route::resource('degree-levels', DegreeLevelController::class);
        Route::resource('faculties', FacultyController::class);
        Route::resource('lecturers', LecturerController::class);
        Route::resource('study-programs', StudyProgramController::class);
        Route::resource('semesters', SemesterController::class);
        Route::resource('academic-semesters', AcademicSemesterController::class);
        Route::resource('courses', CourseController::class);
        Route::resource('curriculums', CurriculumController::class);
        Route::resource('buildings', BuildingController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('classes', ClassController::class);
        Route::resource('weekly-schedules', WeeklyScheduleController::class);
        Route::get('student-weekly-schedules', [StudentWeeklyScheduleController::class, 'index'])->name('student-weekly-schedules.index');
        Route::get('lecturer-weekly-schedules', [LecturerWeeklyScheduleController::class, 'index'])->name('lecturer-weekly-schedules.index');
        Route::get('student-candidates', [CandidateVerificationController::class, 'index'])->name('student-candidates.index');
        Route::get('student-candidates/{candidate}', [CandidateVerificationController::class, 'show'])->name('student-candidates.show');
        Route::get('student-candidates/{candidate}/accept', [CandidateVerificationController::class, 'showAcceptForm'])->name('student-candidates.accept-form');
        Route::put('student-candidates/{candidate}/accept', [CandidateVerificationController::class, 'accept'])->name('student-candidates.accept');
        Route::post('student-candidates/{candidate}/decline', [CandidateVerificationController::class, 'decline'])->name('student-candidates.decline');
    });
