<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('address_id')->nullable()->constrained('addresses')->onDelete('set null');
            $table->string('slug', 255);
            $table->string('company_name', 255)->nullable();
            $table->string('company_phone', 20)->nullable();
            $table->date('since')->nullable();
            $table->string('company_logo', 255)->nullable();
            $table->string('company_photo_cover', 255)->nullable();
            $table->string('tax_code', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('website_url', 255)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('company_size', 255)->nullable();
            $table->string('company_type', 255)->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
