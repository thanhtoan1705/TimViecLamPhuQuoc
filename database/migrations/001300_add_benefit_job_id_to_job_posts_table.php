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
        Schema::table('job_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('benefit_job_id')->nullable()->after('job_type_id'); // Thêm cột khóa ngoại
            $table->foreign('benefit_job_id')->references('id')->on('benefit_jobs')->onDelete('set null'); // Khóa ngoại
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropForeign(['benefit_job_id']); // Xóa khóa ngoại
            $table->dropColumn('benefit_job_id'); // Xóa cột
        });
    }
};
