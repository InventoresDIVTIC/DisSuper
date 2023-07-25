<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});
Route::resource('empleado', EmpleadoController::class);


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);



Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('register');



//Lalo estuvo Aqui
Route::get('/newRol', [RoleController::class, 'showRoleTable'])->name('roles.view');
Route::post('/newRol', [RoleController::class, 'registerRole']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('admin/roles', [AdminController::class, 'roles'])->name('admin.roles');
Route::put('admin/roles/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
Route::get('/admin/create', 'AdminController@createAdmin');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');