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
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->foreignId('pedido_id')->constrained('pedido')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('prenda_id')->constrained('prenda')->cascadeOnUpdate()->restrictOnDelete();
            $table->primary(['pedido_id', 'prenda_id']);
            $table->timestamps();
            $table->unsignedSmallInteger('cantidad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_pedido');
    }
};
