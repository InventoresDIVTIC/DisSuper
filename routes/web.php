<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicoController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/index', function () {
    return view('index');
});

Route::get('/', function () {
    return view('welcome');
});
Route::resource('academico', AcademicoController::class);

Route::resource('registrar', UserController::class);

Route::post('/logout', function () {
    Auth::logout(); // Cierra la sesión del usuario
    return redirect('/index'); // Redirige a la página de inicio u otra página de tu elección
});


