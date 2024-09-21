<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('about_us')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->boolean('preloader')->default(false);
            $table->string('google_recaptcha_site_key')->nullable();
            $table->boolean('google_recaptcha_status')->default(false);
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_client_secret')->nullable();
            $table->enum('paypal_mode', ['sandbox', 'live'])->default('sandbox');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'site_title' => '',
            'phone_number' => '',
            'about_us' => '',
            'logo' => '',
            'favicon' => '',
            'preloader' => false,
            'google_recaptcha_site_key' => '',
            'google_recaptcha_status' => false,
            'paypal_client_id' => '',
            'paypal_client_secret' => '',
            'paypal_mode' => 'sandbox',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
