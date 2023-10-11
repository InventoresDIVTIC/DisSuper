<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->char('RPE_Empleado', 5)->unique()->nullable();
            $table->date('fecha_registro')->nullable(false)->default(today());
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable(); // Nuevo campo para almacenar la ruta de la imagen
            $table->rememberToken();
            $table->timestamps();


            $table->unsignedBigInteger('contrato_id')->nullable();  // Agrega la columna contrato_id
            $table->foreign('contrato_id')->references('id')->on('contratos'); // Agrega la relación
            // Campos adicionales para usuarios

            $table->unsignedBigInteger('empleado_id')->nullable(true);
            $table->foreign('empleado_id')->references('id')->on('empleados');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
