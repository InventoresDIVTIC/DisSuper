<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('zonas', function (Blueprint $table) {
            $table->id('id_zona')->unique()->required();
            $table->string('nombre_zona');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        DB::table('zonas')->insert([
            'id_zona' => 1,
            'nombre_zona' => 'Sin Zona',
            'user_id' => 1,
        ]);

        
        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_zona')->default(0)->nullable();

            $table->foreign('id_zona')->references('id_zona')->on('zonas')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('empleados', function (Blueprint $table){
            $table->dropForeign('id_zona'); //Aqui esta el error, se necesita corregir el nombre de la llave foránea con la nomenclatura correcta
        });
        
        Schema::dropIfExists('zonas');
    }
};
