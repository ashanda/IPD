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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('index_number');
            $table->string('admin_name')->nullable();
            $table->bigInteger('course_id')->nullable();
            $table->bigInteger('batch_id');
            $table->string('payment_type');
            $table->integer('amount');
            $table->string('file_name')->nullable();
            $table->integer('status')->comment('1=active, 2=pending, 3=rejected');
            $table->date('expired_date')->nullable();
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
