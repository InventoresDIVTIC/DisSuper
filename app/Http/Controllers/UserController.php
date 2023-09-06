<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
   
    public function index()
    {
        
        // Obtener todos los usuarios con sus roles
        $users = User::with('roles')->get();

        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        
    }

   

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
        $user->password = Hash::make($request->password); // La contraseña se guarda correctamente hasheada

        $user->save();
        // No inicies sesión manualmente con Auth::login($user);
        // El usuario no se logueará automáticamente después de registrarse
        return redirect('login');
    }

    /**
     * Display the specified resource.
     */

     public function show(string $id)
     {
         // Lógica para obtener el usuario específico basado en el ID
         $user = User::findOrFail($id);
     
         // Pasar el usuario a la vista usuarios.show
         return view('usuarios.show', compact('user'));
     }

    /**s
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

     public function destroy(User $usuario)
     {
         // Verifica si el usuario autenticado tiene el rol 'admin'
         if (auth()->user()->hasRole('admin')) {
             // Elimina el usuario y redirecciona a la vista de listado de usuarios
             $usuario->delete();
             return redirect()->route('usuario.index')->with('success', 'Usuario eliminado exitosamente.');
         }
 
         // Si el usuario autenticado no es 'admin', muestra un mensaje de error y redirecciona al listado de usuarios
         return redirect()->route('usuario.index')->with('error', 'No tienes permiso para eliminar usuarios.');
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





