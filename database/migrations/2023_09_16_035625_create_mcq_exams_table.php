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
        Schema::create('mcq_exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
             $table->string('cname')->nullable();
            $table->json('bid');
            $table->integer('exam_time_duration');
            $table->integer('exam_question');
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcq_exams');
    }
};