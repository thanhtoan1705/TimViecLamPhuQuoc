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
        // Chế độ phúc lợi
        Schema::create('benefit_jobs', function (Blueprint $table) {
            $table->id();
            $table->boolean('insurance')->default(false); // Chế độ bảo hiểm
            $table->boolean('annual_leave')->default(false); // Nghỉ phép năm
            $table->boolean('uniform')->default(false); // Đồng phục
            $table->boolean('salary_increase')->default(false); // Tăng lương
            $table->boolean('bonus')->default(false); // Chế độ thưởng
            $table->boolean('training')->default(false); // Đào tạo
            $table->boolean('allowance')->default(false); // Phụ cấp
            $table->boolean('laptop')->default(false); // Laptop
            $table->boolean('business_trip')->default(false); // Công tác phí
            $table->boolean('travel')->default(false); // Du lịch
            $table->boolean('seniority_allowance')->default(false); // Phụ cấp thâm niên
            $table->boolean('healthcare')->default(false); // Chăm sóc sức khoẻ
            $table->boolean('shuttle_bus')->default(false); // Xe đưa đón
            $table->boolean('sports_club')->default(false); // CLB thể thao
            $table->boolean('international_travel')->default(false); // Du lịch nước ngoài
            $table->text('description')->nullable();
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefit_jobs');
    }
};
