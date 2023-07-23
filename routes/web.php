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


Route::get('/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('empleado', EmpleadoController::class);
Route::resource('registrar', UserController::class);
Route::resource('roles', RoleController::class);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);


//Lalo estuvo Aqui
Route::get('/newRol', [RoleController::class, 'showRoleTable'])->name('roles.view');
Route::post('/newRol', [RoleController::class, 'registerRole']);

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');