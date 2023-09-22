<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Contrato;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $eventual_sindicalizado = Contrato::create([
            'name' => 'EVENTUAL SINDICALIZADO',
        ]);
        $base_sindicalizado = Contrato::create([
            'name' => 'BASE SINDICALIZADO',
        ]);
        $eventual_confianza = Contrato::create([
            'name' => 'EVENTUAL CONFIANZA',
        ]);
        $base_confianza = Contrato::create([
            'name' => 'BASE CONFIANZA',
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
