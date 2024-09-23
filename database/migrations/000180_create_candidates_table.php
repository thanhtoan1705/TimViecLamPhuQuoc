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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();

            $table->string('slug', 255)->unique()->nullable();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');

            $table->foreignId('major_id')
                ->nullable()
                ->constrained('majors')
                ->onDelete('set null');

            $table->foreignId('resume_id')
                ->nullable()
                ->constrained('resumes')
                ->onDelete('set null');

            $table->foreignId('experience_id')
                ->nullable()
                ->constrained('experiences')
                ->onDelete('set null');

            $table->foreignId('education_id')
                ->nullable()
                ->constrained('education')
                ->onDelete('set null');

            $table->foreignId('degree_id')
                ->nullable()
                ->constrained('degrees')
                ->onDelete('set null');

            $table->foreignId('address_id')
                ->nullable()
                ->constrained('addresses')
                ->onDelete('set null');

            $table->foreignId('salary_id')
                ->nullable()
                ->constrained('salaries')
                ->onDelete('set null');


//            $table->bigInteger('salary')->nullable();
            $table->text('description')->nullable();
            $table->boolean('featured')->default(true);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('candidate_skill', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('set null');
            $table->foreignId('skill_id')->nullable()->constrained('skills')->onDelete('set null');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_skill');
        Schema::dropIfExists('candidates');
    }
};
