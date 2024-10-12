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
        Schema::create('user_cvs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('template_id'); // Liên kết với mẫu CV người dùng đã chọn
            $table->text('cv_content'); // Nội dung CV của người dùng, đã được điền thông tin
            $table->timestamps();

            // Foreign key để liên kết với bảng `cv_templates`
            $table->foreign('template_id')->references('id')->on('cv_templates')->onDelete('cascade');

            // Foreign key để liên kết với bảng `users`
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_cvs');
    }
};
