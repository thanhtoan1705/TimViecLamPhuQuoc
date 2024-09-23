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
        Schema::create('job_post_candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->nullable()->constrained('job_posts')->onDelete('set null');
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('set null');
            $table->string('file', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->boolean('viewed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post_candidates');
    }
};
