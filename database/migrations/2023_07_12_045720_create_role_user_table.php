<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Role;

class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
         // Crear el usuario "admin"
         $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@ejemplo.com',
            'fecha_registro' => '2023-08-25',
            'password' => bcrypt('123456789'),
            'RPE_Empleado' => '00000'
        ]);

        // Obtener el rol "Admin"
        $adminRole = Role::where('name', 'Admin')->first();

        // Asignar el rol "Admin" al usuario "admin"
        if ($adminRole) {
            $adminUser->roles()->attach($adminRole);
        }
        
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}