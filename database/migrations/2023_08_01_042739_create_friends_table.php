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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            // $table->integer('user_id');
            $table->foreignID('user_id');
            $table->integer('liked_user_id');
            // $table->foreign('liked_user_id')->references('id')->on('users');
            $table->enum('status', [1, 2])->default(1); // 1 : 1-way like, 2 : 2-way like
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
