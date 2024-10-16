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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 255);
            $table->string('brand_name', 255);
            $table->string('slogan', 255)->nullable();
            $table->string('logo_website', 255)->nullable();
            $table->string('logo_mobile', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->string('copyright', 255)->nullable();
            $table->boolean('website_status')->default(1); // 1: hoạt động, 0: bảo trì
            $table->text('short_intro')->nullable();
            $table->string('company_address', 255)->nullable();
            $table->string('transaction_office', 255)->nullable();
            $table->string('tax_code', 50)->nullable();
            $table->string('hotline', 20)->nullable();
            $table->string('hotline_technical', 20)->nullable();
            $table->string('hotline_sales', 20)->nullable();
            $table->string('landline', 20)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->text('map')->nullable();
            $table->string('seo_title', 255)->nullable();
            $table->text('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_image', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('tiktok', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_setting');
    }
};
