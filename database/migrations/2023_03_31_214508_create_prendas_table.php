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
        Schema::create('prendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->string('nombre');
            $table->foreignId('marca_id')->constrained('marcas')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('categoria_id')->constrained('categorias')->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('talle', ['xs', 's','m', 'l', 'xl']);
            $table->string('color');
            $table->string('imagen');
            $table->decimal('precio', 8, 2);
            $table->text('descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendas');
    }
};
