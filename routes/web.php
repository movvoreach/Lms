<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonContentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Translation\LanguageController as TranslationLanguageController;
use App\Http\Controllers\Translation\TranslationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

    Route::get('/reset-password', [LoginController::class, 'ResetPass'])->name('password.reset');
    Route::get('/choose-password', [LoginController::class, 'ChoosePass'])->name('password.choose');
});

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Auth / Dashboard
    |--------------------------------------------------------------------------
    */
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', fn () => view('admin.dashboard'))->name('dashboard');
    Route::get('/LMS', fn () => view('E-Learning.dashboard'))->name('e-learning');

    /*
    |--------------------------------------------------------------------------
    | Teachers
    |--------------------------------------------------------------------------
    */
    Route::prefix('teacher')
        ->name('teacher.')
        ->middleware('role:admin|teacher')
        ->group(function () {

            // Teacher pages
            Route::get('/workload', [TeacherController::class, 'workload'])->name('workload');
            Route::get('/assign-courses', [TeacherController::class, 'assignCourses'])->name('assign-courses');

            // Admin only
            Route::get('/list', [TeacherController::class, 'index'])->name('index')->middleware('role:admin');
            Route::get('/create', [TeacherController::class, 'create'])->name('create')->middleware('role:admin');
            Route::post('/store', [TeacherController::class, 'store'])->name('store')->middleware('role:admin');
            Route::get('/{user}/edit', [TeacherController::class, 'edit'])->name('edit')->middleware('role:admin');
            Route::put('/{user}', [TeacherController::class, 'update'])->name('update')->middleware('role:admin');
            Route::delete('/{user}', [TeacherController::class, 'destroy'])->name('destroy')->middleware('role:admin');
        });

    /*
    |--------------------------------------------------------------------------
    | Subjects
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
        Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subject.create');
        Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subject.store');
        Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
        Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subject.update');
        Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | Students
    |--------------------------------------------------------------------------
    */
    Route::prefix('student')
        ->name('students.')
        ->middleware('role:admin|staff')
        ->group(function () {
            Route::get('/list', [StudentController::class, 'index'])->name('list');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/store', [StudentController::class, 'store'])->name('store');
        });

    /*
    |--------------------------------------------------------------------------
    | Programs (currently named course)
    |--------------------------------------------------------------------------
    */
    Route::prefix('course')
        ->name('course.')
        ->middleware('role:admin|staff')
        ->group(function () {
            Route::get('/list', [CourseController::class, 'index'])->name('index');
            Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::post('/store', [CourseController::class, 'store'])->name('store');
        });

    /*
    |--------------------------------------------------------------------------
    | Departments (currently named course-categories)
    |--------------------------------------------------------------------------
    */
    Route::prefix('course-categories')
        ->name('course-categories.')
        ->middleware('role:admin|staff')
        ->group(function () {
            Route::get('/', [CourseCategoryController::class, 'index'])->name('index');
            Route::get('/create', [CourseCategoryController::class, 'create'])->name('create');
            Route::post('/store', [CourseCategoryController::class, 'store'])->name('store');
        });

    /*
    |--------------------------------------------------------------------------
    | Lesson Contents
    |--------------------------------------------------------------------------
    */
    Route::prefix('lessons')
        ->name('lessons.')
        ->middleware('role:admin|teacher')
        ->group(function () {
            Route::get('/list', [LessonContentController::class, 'index'])->name('index');
            Route::get('/create', [LessonContentController::class, 'create'])->name('create');
            Route::post('/store', [LessonContentController::class, 'store'])->name('store');

            Route::get('/lesson-contents/{lessonContent}/open', [LessonContentController::class, 'open'])
                ->name('lesson-contents.open');

            Route::get('/lesson-contents/{lessonContent}/download', [LessonContentController::class, 'download'])
                ->name('lesson-contents.download');

            Route::get('/show/{lessonContent}', [LessonContentController::class, 'show'])->name('show');
        });

    /*
    |--------------------------------------------------------------------------
    | Admin Panel
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')
        ->name('admin.')
        ->middleware('role:admin')
        ->group(function () {

            // Language switch
            Route::get('/language/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

            // Language management
            Route::get('/languages', [TranslationLanguageController::class, 'index'])->name('languages.index');
            Route::get('/languages/create', [TranslationLanguageController::class, 'create'])->name('languages.create');
            Route::post('/languages', [TranslationLanguageController::class, 'store'])->name('languages.store');
            Route::post('/languages/{language}/default', [TranslationLanguageController::class, 'setDefault'])->name('languages.default');
            Route::delete('/languages/{language}', [TranslationLanguageController::class, 'destroy'])->name('languages.destroy');

            // Translation management
            Route::post('/translations/add-key', [TranslationController::class, 'addKeyToAll'])->name('translations.addKeyToAll');
            Route::get('/translations/{locale}', [TranslationController::class, 'editByLocale'])->name('translations.editByLocale');
            Route::post('/translations/{locale}', [TranslationController::class, 'updateByLocale'])->name('translations.updateByLocale');

            // Roles
            Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
            Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');

            // Permissions
            Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
            Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
            Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
            Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

            // User roles
            Route::get('/users/{user}/roles', [UserRoleController::class, 'edit'])->name('users.roles.edit');
            Route::post('/users/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');

            // Users
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

            // Settings
            Route::get('/settings', function () {
                return view('admin.settings.index');
            })->name('settings.index');
        });
});
