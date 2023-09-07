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
            $table->timestamps();
        });

        $adminRole = Role::create([
            'name' => 'Admin',
        ]);
        $jefaturaInmediataRole = Role::create([
            'name' => 'Jefatura inmediata',
        ]);
        $jefaturaZonalProcesoRole = Role::create([
            'name' => 'Jefatura zonal de proceso',
        ]);
        $jefaturaZonalProcesoTrabajoRole = Role::create([
            'name' => 'Jefatura zonal de proceso de trabajo',
        ]);
        $superintendenteZonaRole = Role::create([
            'name' => 'Superintendente de zona',
        ]);
        $subjerenteTrabajoRole = Role::create([
            'name' => 'Subjerente de trabajo',
        ]);
        $gerenteDivisionalRole = Role::create([
            'name' => 'Gerente divisional',
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