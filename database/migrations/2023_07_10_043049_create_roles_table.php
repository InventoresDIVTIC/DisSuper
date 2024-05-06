<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nivel_permisos')->nullable();
            $table->timestamps();
        });

        $adminRole = Role::create([
            'name' => 'Admin',
            'nivel_permisos' => 0,
        ]);

        $jefaturaInmediataRole = Role::create([
            'name' => 'Jefatura inmediata',
            'nivel_permisos' => 5,
        ]);
        $jefaturaZonalProcesoRole = Role::create([
            'name' => 'Jefatura zonal de proceso',
            'nivel_permisos' => 5,
        ]);
        $jefaturaZonalProcesoTrabajoRole = Role::create([
            'name' => 'Jefatura zonal de proceso de trabajo',
            'nivel_permisos' => 3,
        ]);
        $superintendenteZonaRole = Role::create([
            'name' => 'Superintendente de zona',
            'nivel_permisos' => 3,
        ]);
        $subjerenteTrabajoRole = Role::create([
            'name' => 'Subjerente de trabajo',
            'nivel_permisos' => 1,
        ]);
        $gerenteDivisionalRole = Role::create([
            'name' => 'Gerente divisional',
            'nivel_permisos' => 1,
        ]);
        
    }


    /**
     * Reverse the migrations.
     */


    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};