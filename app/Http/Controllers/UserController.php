<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sesion.register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sesion.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:40', 'min:1'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Asegúrate de que la contraseña se guarde correctamente hasheada

        $user->save();
        // No inicies sesión manualmente con Auth::login($user);
        // El usuario no se logueará automáticamente después de registrarse
        return redirect('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }









    
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa, redireccionar a una página de bienvenida o a la página principal
            return redirect('/index');
        } else {
            // Autenticación fallida, redireccionar de nuevo al formulario de inicio de sesión con un mensaje de error
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Credenciales inválidas',
            ]);
        }
    }
}
