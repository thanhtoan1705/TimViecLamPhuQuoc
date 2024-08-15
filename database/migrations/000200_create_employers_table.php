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
            $table->foreignId('address_id')->constrained('addresses')->onDelete('cascade');
            $table->string('slug', 255);
            $table->string('name', 255);
            $table->string('phone', 20);
            $table->date('since');
            $table->string('company_logo', 255)->nullable();
            $table->string('tax_code', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('website_url', 255)->nullable();
            $table->string('facebook_url', 255)->nullable();
            $table->string('company_size', 255)->nullable();
            $table->string('company_type', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employers');
    }
};
