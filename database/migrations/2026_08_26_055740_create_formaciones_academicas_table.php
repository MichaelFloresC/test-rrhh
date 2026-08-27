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
        Schema::create(
            'formaciones_academicas',
            function (Blueprint $table) {

                $table->id();

                $table->foreignId('persona_id')
                    ->constrained('personas')
                    ->cascadeOnDelete();

                $table->string('nivel', 50);

                $table->string('titulo', 250);

                $table->string('institucion', 250);

                $table->string('pais', 100)
                    ->nullable();

                $table->date('fecha_inicio')
                    ->nullable();

                $table->date('fecha_fin')
                    ->nullable();

                $table->boolean('concluido')
                    ->default(true);

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formaciones_academicas');
    }
};
