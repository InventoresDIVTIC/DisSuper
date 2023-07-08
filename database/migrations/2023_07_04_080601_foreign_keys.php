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
        Schema::table('empleados', function (Blueprint $table) {
            $table->foreignId('id_user')->constrained(table: 'users', indexName: 'id_user', column: 'id_user');
        });
        

        Schema::table('users', function (Blueprint $table) {
            $table->char("RPE_Empleado", 8);
            $table->foreign("RPE_Empleado")->references('RPE_Empleado')->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('RPE_Empleado');
        });

        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign('id_user');
        });
    }
};
