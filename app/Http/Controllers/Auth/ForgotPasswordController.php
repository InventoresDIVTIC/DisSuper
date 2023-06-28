<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showResetForm(Request $request)
    {
        return view('auth.passwords.email');
    }

    protected function sendResetLinkResponse($response)
    {
        $status = is_string($response) ? $response : strval($response);
        Session::flash('success', $status);
        return back()->with('status', $status);
    }
    

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        // Envía el correo electrónico de restablecimiento de contraseña
        Mail::to($request->input('email'))->send(new ResetPasswordEmail());

        // Opcional: Puedes personalizar el mensaje de éxito
        return back()->with('status', 'Se ha enviado un correo electrónico de restablecimiento de contraseña.');
    }

    protected function broker()
    {
        return Password::broker();
    }
}