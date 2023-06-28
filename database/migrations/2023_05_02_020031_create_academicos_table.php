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
        Schema::create('academicos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("nombrep")->require();
            $table->date('fecha')->require();
            $table->string("observaciones");
            $table->integer("no_acta")->require();
        });
    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academicos');
    }
};
