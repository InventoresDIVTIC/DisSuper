<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Contrato;
use App\Models\Role;
use App\Models\Zonas;
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
  
        $photoUrl = asset( $usuario->photo); // Obtener la URL de la foto
        
        return view('usuarios.show', compact('usuario', 'contratos','roles','photoUrl'));
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

    // Almacenar la ruta de la foto anterior (si existe)
    $oldPhotoPath = $usuario->photo;

    // Actualizar los campos con los nuevos valores del formulario
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->RPE_Empleado = $request->input('RPE_Empleado');
    $usuario->fecha_registro = $request->input('fecha_registro');
    $usuario->contrato()->associate($request->input('contrato'));
    $usuario->roles()->sync($request->input('rol'));

    // Actualizar la foto de perfil si se proporciona una nueva
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');

        if ($photo->isValid()) {
            $imageName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('dist/img/photo_users'), $imageName);

            $usuario->photo = 'dist/img/photo_users/' . $imageName;

            // Eliminar la foto de perfil anterior si existe
            if ($oldPhotoPath && file_exists(public_path($oldPhotoPath))) {
                unlink(public_path($oldPhotoPath));
            }
        } else {
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





