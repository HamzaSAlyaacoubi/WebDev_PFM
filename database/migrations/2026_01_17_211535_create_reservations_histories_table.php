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
        Schema::create('reservations_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_resource');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_category')->references('id')->on('resource_categories')->onDelete('cascade');
            $table->timestamp('reservation_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('user_justification')->nullable();
            $table->enum('status', ['accepted', 'rejected']);
            $table->text('responsable_justification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations_histories');
    }
};
