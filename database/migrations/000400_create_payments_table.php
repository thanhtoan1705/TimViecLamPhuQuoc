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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employer_id')->nullable()->constrained('employers')->onDelete('set null');
            $table->foreignId('packages_id')->nullable()->constrained('job_post_packages')->onDelete('set null');
            $table->foreignId('promotion_id')->nullable()->constrained('promotions')->onDelete('set null');
            $table->bigInteger('amount');
            $table->dateTime('payment_date');
            $table->dateTime('expiration_date');
            $table->string('payment_method', 255);
            $table->tinyInteger('payment_status')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
