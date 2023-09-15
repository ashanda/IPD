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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('index_number')->unique()->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->integer('contact_number')->unique();
            $table->date('dob')->nullable();
            $table->json('batch')->nullable();
            $table->string('address')->nullable();
            $table->string('coupen_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('type')->default(0);
            $table->Integer('status')->default(1);
            $table->string('cover')->nullable();
            /* Users: 0=>User, 1=>Admin, 2=>Instrctor */
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
