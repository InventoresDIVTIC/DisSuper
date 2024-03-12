<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class ResetPasswordController extends Controller
{
    /**
     * Show the form to reset the user's password.
     *
     * @param  string  $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    /**
     * Reset the given user's password and automatically log them in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        // Busca el usuario por su correo electrónico
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // Si el usuario no existe, redirecciona de nuevo con un mensaje de error
            return back()->withErrors(['email' => ['No se encontró ningún usuario con este correo electrónico']]);
        }

        // Resetea la contraseña del usuario
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            // Loguea al usuario
            Auth::login($user);
        
            // Almacena el mensaje de éxito en la sesión
            session()->flash('success', '¡Tu contraseña ha sido cambiada con éxito!');

            // Redirecciona al usuario a la página de inicio con el mensaje de éxito
            return redirect()->route('/index')->with('success', '¡Tu contraseña ha sido cambiada con éxito!');
        } else {
            // Si falla el reseteo de la contraseña, redirecciona con un mensaje de error
            return back()->withErrors(['email' => [__($status)]]);
        }
        
    }
}
