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
//            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('set null');
            $table->foreignId('job_id')->nullable()->constrained('job_posts')->onDelete('set null');
            $table->foreignId('employer_id')->nullable()->constrained('employers')->onDelete('set null');
            $table->string('name',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
//            $table->time('time')->nullable();
//            $table->string('viewer',255)->nullable();
            $table->string('location',255)->nullable();
            $table->boolean('status')->default(0);
            $table->text('feedback')->nullable();
//            $table->date('date')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->string('color',255)->nullable();
            $table->json('job_post_candidates')->nullable(); // Lưu danh sách ứng viên dưới dạng JSON
            $table->text('note')->nullable();
            $table->timestamps();
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
