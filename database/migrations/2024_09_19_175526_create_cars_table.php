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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 

            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('state_id')->constrained()->cascadeOnDelete();
            $table->dateTime('technical_inspection');  
            $table->json('image_path');
            
            $table->integer('year');
            $table->string('license_plate')->unique();
            $table->decimal('daily_rate', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('is_available')->default(true);
            $table->boolean('show_on_website')->default(true);
            $table->string('slug')->unique()->nullable();
            $table->text('keywords')->nullable();

            $table->text('features')->nullable();  
    $table->boolean('is_insured')->default(true);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
