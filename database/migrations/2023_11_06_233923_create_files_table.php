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
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name', 100);
            $table->string('file_path');
            $table->string('file_ext', 5);
            $table->unsignedInteger('file_size'); // in bytes
            $table->smallInteger('estado_file_id')->default(1);

            $table->unsignedInteger('folder_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('tenan_id');
            $table->unsignedInteger('user_id');
            $table->foreign('folder_id')->references('id')->on('folders');
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('files');
    }
};
