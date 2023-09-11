<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Contrato;
use App\Models\Role;
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

     public function show($id)
    {
        $usuario = User::findOrFail($id); // Suponiendo que estás buscando un usuario por su ID
        $contratos = Contrato::all();
        $roles = Role::all();
        return view('usuarios.show', compact('usuario', 'contratos','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        $contratos = Contrato::all();
        return view('usuarios.show', compact('usuario', 'contratos'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
        
     // Validación de datos
     $validator = Validator::make($request->all(), [
        // ... otras reglas de validación ...

        'photo' => 'nullable|image|max:5000',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

      // Obtener el usuario que deseas actualizar
      $usuario = User::findOrFail($id);
      
      // Actualizar los campos con los nuevos valores del formulario
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->RPE_Empleado = $request->input('RPE_Empleado');
    $usuario->fecha_registro = $request->input('fecha_registro');
    // Actualizar el contrato
    $usuario->contrato()->associate($request->input('contrato'));
    
    // Actualizar los roles
    $usuario->roles()->sync($request->input('rol'));
    // Actualizar otros campos si es necesario

     // Actualizar la foto de perfil si se proporciona una nueva
     
    // Actualizar la foto de perfil si se proporciona una nueva
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');

        // Verifica si hay errores en la carga del archivo
        if ($photo->isValid()) {
            // El archivo es válido, procede con el procesamiento y almacenamiento
            $photoData = base64_encode(file_get_contents($photo->getRealPath()));
            $usuario->photo = $photoData;
        } else {
            // El archivo no es válido, maneja el error apropiadamente
            return redirect()->back()->withInput()->withErrors([
                'photo' => 'El archivo de foto no es válido.',
            ]);
        }
    }

    // Guardar los cambios en la base de datos
    $usuario->save();

    // Redirigir a una página de confirmación o de detalles del usuario
    return redirect()->route('usuario.show', $id)->with('success', 'Los cambios se han guardado correctamente.');
}



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





