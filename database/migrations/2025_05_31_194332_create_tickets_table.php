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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('transport_type_id')->constrained('transport_types');
            $table->foreignId('pickup_stop_id')->constrained('stops');
            $table->foreignId('dropoff_stop_id')->constrained('stops');
            $table->date('travel_date');
            $table->timestamp('used_at')->nullable();
            $table->string('status');
            $table->decimal('price', 10, 2);
            $table->timestamp('booked_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
