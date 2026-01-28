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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->integer('cpu');
            $table->integer('ram');
            $table->integer('storage');
            $table->string('storage_type')->nullable();
            $table->string('os');
            $table->string('location')->nullable();
            $table->enum('status', ['disponible', 'indisponible', 'maintenance'])->default('disponible');
            $table->integer('quantity_available');
            $table->integer('quantity_used')->default(0);
            $table->string('description')->nullable();
            $table->foreignId('id_category')->constrained('resource_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
