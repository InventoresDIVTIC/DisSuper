<?php

use App\Models\FuncionesPuestos;
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
        Schema::create('funciones_puestos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('clave_funcion')->required();
            $table->string('nombre_funciones')->required();
            $table->string('tipo_funcion')->required(); 
        });

        $TomaLecturas = FuncionesPuestos::create([
            'clave_funcion' => '673X1-1.1',
            'nombre_funciones' => 'TOMA DE LECTURAS',
            
            'tipo_funcion' => 'Funcion Específica'
        ]);

        $RepartirAvisoRecibo = FuncionesPuestos::create([
            'clave_funcion' => '673X1-1.2',
            'nombre_funciones' => 'REPARTIR AVISO-RECIBO',
            'tipo_funcion' => 'Funcion Específica'
        ]);

        $SuspensionReconexion = FuncionesPuestos::create([
            'clave_funcion' => '673X1-1.3',
            'nombre_funciones' => 'SUSPENSION Y RECONEXION ENERGIA ELECTRICA BAJA TENSION',
            'tipo_funcion' => 'Funcion Específica'
        ]);

        $BusquedaAnomalias = FuncionesPuestos::create([
            'clave_funcion' => '673X1-1.4',
            'nombre_funciones' => 'DETECTAR Y REPORTAR ANOMALIAS DE ACCION E INFORMATIVAS',
            'tipo_funcion' => 'Funcion Específica'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funciones_puestos');
    }
};
