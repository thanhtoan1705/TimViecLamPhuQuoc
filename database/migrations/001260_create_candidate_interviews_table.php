<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('candidate_interviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('interview_id')
                ->constrained('interviews')
                ->onDelete('cascade');
            $table->foreignId('candidate_id')
                ->constrained('candidates')
                ->onDelete('cascade');
            $table->timestamps();

            // Tạo unique key để tránh duplicate
            $table->unique(['interview_id', 'candidate_id']);
        });
    }

    public function down()
    {
        if (Schema::hasTable('candidate_interviews')) {
            Schema::table('candidate_interviews', function (Blueprint $table) {
                $table->dropForeign(['interview_id']);
                $table->dropForeign(['candidate_id']);
            });
        }

        Schema::dropIfExists('candidate_interviews');
    }
};
