<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('acciones');
        Schema::create('acciones', function (Blueprint $table) {
            $table->id('id_accion')->unique()->required();
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_accion');
            $table->timestamp('fecha_accion')->required();
            $table->string('SQL')->required();
            $table->string('status')->required();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::dropIfExists('zonas');

        Schema::create('zonas', function (Blueprint $table) {
            $table->id('id_zona')->unique()->required();
            $table->string('nombre_zona');
            $table->unsignedBigInteger('user_id');
        });

        DB::table('zonas')->insert([
            'id_zona' => 0,
            'nombre_zona' => 'Sin Zona',
            'user_id' => 1,
        ]);
        

        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_zona')->default(0)->nullable();

            $table->foreign('id_zona')->references('id_zona')->on('zonas')->onDelete('cascade');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('contraseña_seguridad')->default(bcrypt('123456789'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('contraseña_seguridad');
        });

        Schema::table('empleados', function (Blueprint $table){
            $table->dropForeign('id_zona');
        });

        Schema::dropIfExists('acciones');

        Schema::dropIfExists('zonas');

        

        
    }
};
