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
        Schema::create('cv_fields', function (Blueprint $table) {
            $table->id();
            $table->string('fields_name', 255);
            $table->string('fields_type', 255); // Loại field (text, date, email, v.v.)
            $table->unsignedBigInteger('template_id'); // Liên kết với template
            $table->integer('order')->default(0); // Để lưu thứ tự của các trường


            // Foreign key để liên kết với bảng `cv_templates`
            $table->foreign('template_id')->references('id')->on('cv_templates')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv_fields');
    }
};
