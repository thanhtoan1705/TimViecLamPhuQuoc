<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('language_proficiencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidate_id')->nullable()->constrained('candidates')->onDelete('cascade');
            $table->string('language', 100)->nullable(); // Tên tiếng
            $table->string('proficiency_level', 50)->nullable(); // Mức độ thành thạo
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('language_proficiencies');
    }
};
