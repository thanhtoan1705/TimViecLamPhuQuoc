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
        Schema::create('user_cv_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('template_id');
            $table->unsignedBigInteger('fields_id'); // Thêm cột fields_id
            $table->text('fields_value'); // Giá trị của các field đã được điền
            $table->timestamps();

            // Foreign key để liên kết với bảng `cv_templates`
            $table->foreign('template_id')->references('id')->on('cv_templates')->onDelete('cascade');

            // Foreign key để liên kết với bảng `cv_fields`
            $table->foreign('fields_id')->references('id')->on('cv_fields')->onDelete('cascade'); // Thêm liên kết với bảng `cv_fields`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cv_data');
    }
};
