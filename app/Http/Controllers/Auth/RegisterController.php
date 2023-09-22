<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Contrato;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/usuario';

    public function __construct()
    {
        
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'RPE_Empleado' => ['required',  'string'],
            'fecha_registro'=>['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'exists:roles,id'], // Validar que el rol seleccionado existe en la tabla roles
            
           

        ]);
    }

    
    protected function create(array $data)
    {
        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->RPE_Empleado = $data['RPE_Empleado'];
        $user->fecha_registro = $data['fecha_registro']; // Asegúrate de que $data['fecha_registro'] esté en formato 'YYYY-MM-DD'

        // Asociar el contrato seleccionado al empleado
        $user->contrato_id = $data['contrato']; 
        $user->save();

        // Asignar el rol seleccionado al nuevo usuario
        $role = Role::find($data['role']);
        $user->roles()->attach($role);

        return $user;
    }



    // Sobrescribe el método register para evitar el inicio de sesión automático
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        
        return redirect($this->redirectPath())
            ->with('status', 'Usuario creado correctamente'); // Puedes ajustar el mensaje de éxito según tus necesidades
    }



    public function showRegistrationForm()
    {
        // Verificar si el usuario actual es el usuario "admin" o tiene el rol de administrador
    
        $adminRole = Role::where('name', 'Admin')->first();
        $user = auth()->user();

        if ($user && $user->roles->contains($adminRole)){
            // Obtener todos los roles disponibles de la base de datos
            $roles = Role::all();
            $contratos = Contrato::all();
            return view('auth.register', compact('roles', 'contratos')); // Pasar los roles a la vista
        } else {
            abort(403); // Retorna un error 403 Forbidden si el usuario no tiene permisos de administrador
        }
    }


}
