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
        Schema::create('interviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('job_post_id')->nullable()->constrained('job_posts')->onDelete('set null');
            $table->foreignId('employer_id')->nullable()->constrained('employers')->onDelete('set null');
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('set null');

            $table->string('title')->nullable();
            $table->enum('interview_type', ['online', 'offline'])->default('online');
            $table->string('location')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->integer('duration')->nullable(); // Thời lượng (phút)
            $table->text('description')->nullable();

            $table->enum('status', ['pending', 'scheduled', 'completed', 'cancelled'])->default('pending');
            $table->text('feedback')->nullable();
            $table->text('notes')->nullable();

            // Thông tin Zoom Meeting (cho phỏng vấn online)
            $table->string('zoom_meeting_id', 100)->nullable();
            $table->string('zoom_password', 100)->nullable();
            $table->text('zoom_join_url')->nullable();
            $table->text('zoom_start_url')->nullable();

            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();

            $table->string('color')->nullable();

            $table->boolean('reminder_sent')->default(false);

            $table->timestamps();
            $table->softDeletes(); // Thêm soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
