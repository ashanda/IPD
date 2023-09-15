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
        Schema::create('course_works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cname')->nullable();
            $table->string('description');
            $table->date('publish_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->json('bid');
            $table->integer('status')->default(1);
            $table->string('document');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_works');
    }
};
