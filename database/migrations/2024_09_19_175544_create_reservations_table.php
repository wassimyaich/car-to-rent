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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('phone');
            $table->foreignId('car_id')->constrained();
            // $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->string('pickup_location');
            $table->string('dropoff_location');

            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->enum('status', ['pending','reserved', 'active', 'completed', 'cancelled'])->default('pending');
            $table->string('email')->nullable();  //add it
            $table->enum('user_type', ['guest', 'registered'])->default('guest'); //add it
            $table->string('payment_method')->nullable();//add it
            $table->text('cancellation_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
