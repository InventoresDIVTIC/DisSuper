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
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\BotManController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    
    Route::middleware(['nivel_5'])->group(function () {
        Route::get('/index', [EmpleadoController::class, 'index']);
        Route::resource('/empleado', EmpleadoController::class);
        Route::get('/formulario', [DocumentosController::class, 'mostrarFormulario']);
        Route::post('/subir-documento', [DocumentosController::class, 'procesarFormulario2']);
        Route::post('/guardar-documento', [DocumentosController::class, 'procesarFormulario2']);
        Route::post('/download/pdf/{id}', [DocumentosController::class, 'downloadPDF'])->name('download.pdf');
        Route::get('/notificaciones', [NotificationController::class, 'mostrarNotificaciones'])->name('notificaciones.mostrar');
        Route::delete('/notificaciones/eliminar', [NotificationController::class, 'eliminarNotificaciones'])->name('notificaciones.eliminar');
        Route::get('/descargar/documento/{id}', [DocumentosController::class, 'downloadPDF'])->name('descargar.documento');
        Route::get('/editar/documento/{id}', [DocumentosController::class, 'editarDocumento'])->name('editar.documento');
        Route::post('/guardar_edicion/{id}', [DocumentosController::class, 'guardarEdicion'])->name('guardar_edicion');
        Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
        Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
        Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
        Route::resource('/usuario', UserController::class)->only(['edit', 'update', 'show'])
        ->middleware('check_user_ownership');
        
        Route::get('/404', function () {
            return view('404');
        })->name('404');
        Route::get('/contact', function () {
            return view('contacto');
        })->name('contacto');
        Route::match(['get','post'], 'botman',[BotManController::class , "handle"]);
        Route::post('/cambiar_estado/{id}', [DocumentosController::class, 'cambiarEstado'])->name('cambiar.estado');
        Route::post('/rechazar/documento/{id}', [DocumentosController::class, 'rechazarDocumento'])->name('rechazar.documento');
        Route::post('/procesar-formulario', [DocumentosController::class, 'procesarFormulario']);
        Route::post('/cambiar-archivo/{documento}', [DocumentosController::class, 'cambiarArchivo'])->name('documento.cambiar-archivo');
        Route::post('/redirigir-documento/{id}', [DocumentosController::class, 'redirigirDocumento'])->name('redirigir.documento');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });
    

    Route::middleware(['nivel_0'])->group(function () {
        Route::resource('/usuario', UserController::class)->only(['destroy', 'create', 'store','index']);
        Route::resource('/zonas', ZonasController::class);
        Route::resource('/roles', RoleController::class);
        Route::post('/cancelar/documento/{id}', [DocumentosController::class, 'cancelarDocumento'])->name('cancelar.documento');
        Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
        Route::post('/registro', [RegisterController::class, 'register']);

    });
    
    Route::middleware(['nivel_3'])->group(function () {
        // Rutas protegidas que requieren el rol 'JEFATURA ZONAL DE PROCESO'
    });

    Route::middleware(['nivel_1'])->group(function () {
        Route::resource('/contratos', ContratoController::class);
        Route::resource('puestos', PuestosController::class);
        Route::resource('/indicadores', IndicadoresController::class);
        Route::resource('actividades', ActividadesController::class);
        Route::delete('/puestos/{puesto}/actividades/{actividad}', [PuestosController::class, 'detach'])->name('puestos.detach');
        Route::delete('/actividades/{actividad}/indicadores/{indicador}', [ActividadesController::class, 'eliminarIndicador'])->name('actividades.eliminarIndicador');
        Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
        Route::post('/registro', [RegisterController::class, 'register']);
    });
});





Auth::routes();




// Luego, para configurar el widget, podrías hacerlo en algún punto de inicialización de tu aplicación





