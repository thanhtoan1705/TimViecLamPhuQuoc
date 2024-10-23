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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('cascade');
            $table->string('position', 255)->nullable(); // Vị trí
            $table->string('company_name', 255)->nullable(); // Tên công ty
            $table->date('start_date')->nullable(); // Thời gian bắt đầu
            $table->date('end_date')->nullable(); // Thời gian kết thúc (có thể null nếu là công việc hiện tại)
            $table->text('description')->nullable(); // Mô tả
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
