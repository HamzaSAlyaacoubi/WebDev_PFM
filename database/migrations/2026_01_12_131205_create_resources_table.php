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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('manufacturer')->nullable();
            $table->foreignId('category_id')->constrained('resource_categories')->onDelete('cascade');
            $table->integer('cpu');
            $table->integer('ram');
            $table->integer('storage');
            $table->string('os')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['disponible', 'indisponible', 'maintenance'])->default('disponible');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
