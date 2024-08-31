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
        Schema::create('job_post_packages', function (Blueprint $table) {
            $table->id();

            $table->string('title', 255);
            $table->bigInteger('price');
            $table->string('period', 255);
            $table->bigInteger('quantity');
            $table->bigInteger('limit_job_post');
            $table->boolean('display_top')->default(false);
            $table->boolean('display_best')->default(false);
            $table->boolean('display_haste')->default(false);
            $table->text('descriptions');
            $table->boolean('status')->default(false);

            $table->timestamps();
        });

        Schema::create('saved_jobs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('candidate_id')
                ->constrained('candidates')
                ->onDelete('cascade');

            $table->foreignId('job_post_id')
                ->constrained('job_posts')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_jobs');
        Schema::dropIfExists('job_post_packages');
    }
};
