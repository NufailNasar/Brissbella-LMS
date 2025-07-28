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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name')->nullable();
            // $table->string('qualification')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('cid')->nullable(); 
            $table->foreign('cid')->references('id')->on('cources')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
