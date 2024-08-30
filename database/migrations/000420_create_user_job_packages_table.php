<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_job_packages', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('packages_id');
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('packages_id')->references('id')->on('job_post_packages')->onDelete('cascade');

            $table->integer('remaining_posts')->comment('Theo dõi số lượng bài đăng còn lại trong gói');
            $table->timestamp('expires_at')->comment('Theo dõi khi nào gói hết hạn');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_job_packages');
    }
};
