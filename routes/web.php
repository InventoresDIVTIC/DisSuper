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
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ZonasController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [EmpleadoController::class, 'index']);
Route::resource('empleado', EmpleadoController::class);
Route::resource('usuario', UserController::class);
Route::resource('zonas', ZonasController::class);
Route::resource('contratos', ContratoController::class);
Route::resource('roles', RoleController::class);
Route::resource('puestos', PuestosController::class);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('register');





Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');