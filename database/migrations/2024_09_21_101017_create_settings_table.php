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
            
            // Image settings
            $table->string('about_image')->nullable();
            $table->string('blog_single_image')->nullable();
            $table->string('blog_image')->nullable();
            $table->string('car_single_image')->nullable();
            $table->string('car_image')->nullable();
            $table->string('contact_image')->nullable();
            $table->string('index_image')->nullable();
            $table->string('pricing_image')->nullable();
            $table->string('services_image')->nullable();
            
            // Footer settings
            $table->string('phone_number')->nullable();
            $table->text('about_us')->nullable();
            $table->text('place')->nullable();
            $table->text('description')->nullable();
            $table->text('name')->nullable();
            
            // Header settings
            $table->string('logo')->nullable();
            $table->string('site_title')->nullable();
            $table->string('favicon')->nullable();
            
            // SEO settings
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
            // Social media links
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedin_link')->nullable();
            
            // Contact info
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            
            // Analytics
            $table->text('google_analytics_id')->nullable();
            
            // Theme settings
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('font_family')->nullable();
            
            // Other settings
            $table->boolean('preloader')->default(false);
            $table->string('google_recaptcha_site_key')->nullable();
            $table->boolean('google_recaptcha_status')->default(false);
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_client_secret')->nullable();
            $table->enum('paypal_mode', ['sandbox', 'live'])->default('sandbox');
            $table->boolean('maintenance_mode')->default(false);
            $table->text('maintenance_message')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            
            $table->timestamps();
        });
    
        // Insert default settings
        DB::table('settings')->insert([
            'about_image' => '',
            'blog_single_image' => '',
            'blog_image' => '',
            'services_image' => '',
            'pricing_image' => '',
            'index_image' => '',
            'contact_image' => '',
            'car_image' => '',
            'car_single_image' => '',
            'place' => '',
            'description' => '',
            'logo' => '',
            'site_title' => '',
            'phone_number' => '',
            'about_us' => '',
            'favicon' => '',
            'preloader' => false,
            'google_recaptcha_site_key' => '',
            'google_recaptcha_status' => false,
            'paypal_client_id' => '',
            'paypal_client_secret' => '',
            'paypal_mode' => 'sandbox',
            'meta_description' => '',
            'meta_keywords' => '',
            'facebook_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
            'linkedin_link' => '',
            'email' => '',
            'address' => '',
            'google_analytics_id' => '',
            'primary_color' => '',
            'secondary_color' => '',
            'font_family' => '',
            'maintenance_mode' => false,
            'maintenance_message' => '',
            'custom_css' => '',
            'custom_js' => '',
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
