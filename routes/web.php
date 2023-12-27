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
use App\Http\Controllers\FuncionesPuestosController;
use App\Http\Controllers\IndicadoresController;
use App\Http\Controllers\PuestosController;
use App\Http\Controllers\ZonasController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\DocumentosController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::middleware(['jefaturaInmediata'])->group(function () {
        Route::get('/index', [EmpleadoController::class, 'index']);
        Route::resource('empleado', EmpleadoController::class);
        Route::get('/formulario', [DocumentosController::class, 'mostrarFormulario']);
        Route::post('/procesar-formulario', [DocumentosController::class, 'procesarFormulario']);
        Route::post('/download/pdf/{id}', [DocumentosController::class, 'downloadPDF'])->name('download.pdf');
        Route::get('/notificaciones', [NotificationController::class, 'mostrarNotificaciones'])->name('notificaciones.mostrar');
        Route::delete('/notificaciones/eliminar', [NotificationController::class, 'eliminarNotificaciones'])->name('notificaciones.eliminar');
        Route::get('/descargar/documento/{id}', [DocumentosController::class, 'downloadPDF'])->name('descargar.documento');


        
    });
Route::middleware(['admin'])->group(function () {
    Route::resource('usuario', UserController::class);
    Route::resource('zonas', ZonasController::class);
    Route::resource('roles', RoleController::class);
});

Route::middleware(['jefaturaZonalProceso'])->group(function () {
    // Rutas protegidas que requieren el rol 'JEFATURA ZONAL DE PROCESO'
});

Route::middleware(['jefaturaZonalProcesoTrabajo'])->group(function () {
    Route::resource('contratos', ContratoController::class);
    Route::resource('puestos', PuestosController::class);
    Route::resource('funciones_puestos', FuncionesPuestosController::class);
    Route::resource('indicadores', IndicadoresController::class);
    Route::resource('actividades', ActividadesController::class);
    Route::delete('puestos/{puesto}/actividades/{actividad}', [PuestosController::class, 'detach'])->name('puestos.detach');
    Route::delete('actividades/{actividad}/indicadores/{indicador}', [ActividadesController::class, 'eliminarIndicador'])->name('actividades.eliminarIndicador');
    Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
    Route::post('/registro', [RegisterController::class, 'register'])->name('register');
});












});

Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('register');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




