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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->nullable();

            $table->foreignId('job_category_id')->nullable()
                ->constrained('job_categories')->onDelete('set null');

            $table->foreignId('major_id')->nullable()
                ->constrained('majors')->onDelete('set null');

            $table->foreignId('employer_id')->nullable()
                ->constrained('employers')->onDelete('set null');

            $table->foreignId('experience_id')->nullable()
                ->constrained('experiences')->onDelete('set null');

            $table->foreignId('job_type_id')->nullable()
                ->constrained('job_types')->onDelete('set null');

            $table->foreignId('rank_id')->nullable()->comment('chức vụ')
            ->constrained('ranks')->onDelete('set null');

//            $table->foreignId('skill_id')->nullable()->comment('Kỹ năng')
//                ->constrained('skills')->onDelete('set null');

            $table->foreignId('degrees_id')->nullable()
                ->constrained('degrees')->onDelete('set null');

            $table->timestamp('start_date')->nullable();

            $table->timestamp('end_date')->nullable();
            $table->text('description')->nullable();
            $table->string('meta_title', 255)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('meta_keyword', 255)->nullable();
            $table->bigInteger('salary_min')->nullable();
            $table->bigInteger('salary_max')->nullable();
            $table->bigInteger('quantity')->nullable();

            $table->string('email', 255)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('department', 255)->nullable();
            $table->text('job_requirement')->nullable();
            $table->text('cv_requirement')->nullable();

            $table->boolean('status')->default(0);
            $table->boolean('premium')->default(0);
            $table->string('address', 255)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

        Schema::table('job_posts', function (Blueprint $table) {
            $table->foreignId('salary_id')->constrained()->onDelete('cascade');
        });

        Schema::create('job_post_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->nullable()->constrained('job_posts')->onDelete('set null');
            $table->foreignId('skill_id')->nullable()->constrained('skills')->onDelete('set null');
            $table->timestamps();
        });

        Schema::create('job_post_major', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_post_id')->nullable()->constrained('job_posts')->onDelete('set null');
            $table->foreignId('major_id')->nullable()->constrained('majors')->onDelete('set null');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_post_skill');
        Schema::dropIfExists('job_post_major');
        Schema::dropIfExists('job_posts');

    }
};
