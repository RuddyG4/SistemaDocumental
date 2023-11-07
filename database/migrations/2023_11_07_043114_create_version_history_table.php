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
        Schema::create('version_history', function (Blueprint $table) {
            $table->increments('id');
            $table->date('version_date');
            $table->string('path');
            $table->unsignedInteger('user_id');
            $table->string('name_user', 60);
            $table->unsignedInteger('file_id')->nullable();
            $table->unsignedInteger('tenan_id');
            $table->unsignedInteger('version_anterior_id')->nullable();
            $table->unsignedInteger('version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('version_history');
    }
};
