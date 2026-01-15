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
        Schema::create('networks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->enum('type', ['Switch', 'Router', 'Firewall']);
            $table->string('model');
            $table->integer('port_number');
            $table->string('speed');
            $table->enum('status', ['disponible', 'indisponible', 'maintenance'])->default('disponible');
            $table->integer('quantity_available');
            $table->string('description')->nullable();
            $table->foreignId('id_categorie')->constrained('resource_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('networks');
    }
};
