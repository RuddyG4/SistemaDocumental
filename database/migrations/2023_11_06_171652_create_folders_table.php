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
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folder_name', 60);
            $table->string('description');
            
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('tenan_id');
            $table->unsignedInteger('user_id');
            $table->foreign('parent_id')->references('id')->on('folders');
            $table->foreign('tenan_id')->references('id')->on('customers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('folders');
    }
};
