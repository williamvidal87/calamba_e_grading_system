<?php

use App\Http\Livewire\AdminPanel\ManageUsers\AdminTable;
use App\Http\Livewire\AdminPanel\ManageUsers\StudentTable;
use App\Http\Livewire\AdminPanel\ManageUsers\TeacherTable;
use App\Http\Livewire\AdminPanel\Subject\SubjectTable;
use App\Http\Livewire\DashBoard\DashBoard;
use App\Http\Livewire\Profile\EditProfileForm;
use App\Http\Livewire\Profile\PasswordUpdate;
use App\Http\Livewire\StudentPanel\MyClass\MyClassTable as MyClassMyClassTable;
use App\Http\Livewire\TeacherPanel\Myclass\MyclassTable;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {   
    // return view('welcome');   
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    
    Route::get('/dashboard', DashBoard::class)->name('dashboard');
    Route::get('/editprofileform', EditProfileForm::class)->name('editprofileform');
    Route::get('/passwordupdate', PasswordUpdate::class)->name('passwordupdate');
    
    // Admin Panel
    Route::get('/admin-admin-table', AdminTable::class)->name('admin-admin-table')->middleware('checkRulepermissionadmin');
    Route::get('/admin-teacher-table', TeacherTable::class)->name('admin-teacher-table')->middleware('checkRulepermissionadmin');
    Route::get('/admin-student-table', StudentTable::class)->name('admin-student-table')->middleware('checkRulepermissionadmin');
    Route::get('/admin-subject-table', SubjectTable::class)->name('admin-subject-table')->middleware('checkRulepermissionadmin');
    // Teacher Panel
    Route::get('/teacher-myclass-table', MyclassTable::class)->name('teacher-myclass-table')->middleware('checkRulepermissionteacher');
    Route::get('/teacher-student-table', StudentTable::class)->name('teacher-student-table')->middleware('checkRulepermissionteacher');
    Route::get('/teacher-subject-table', SubjectTable::class)->name('teacher-subject-table')->middleware('checkRulepermissionteacher');
    // Student Panel
    Route::get('/student-myclass-table', MyClassMyClassTable::class)->name('student-myclass-table')->middleware('checkRulepermissionstudent');
    
});
