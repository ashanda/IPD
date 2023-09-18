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
        Schema::create('tutes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('cname')->nullable();
            $table->string('description');
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
        Schema::dropIfExists('tutes');
    }
};
