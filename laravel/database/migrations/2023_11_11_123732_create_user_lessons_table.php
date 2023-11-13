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
        Schema::create('user_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->dateTime('started_at');
            $table->dateTime('finished_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','user_lessons_users_idx');
            $table->index('lesson_id','user_lessons_lessons_idx');

            $table->foreign('user_id','user_lessons_users_fk')->on('users')->references('id');
            $table->foreign('lesson_id','user_lessons_lessons_fk')->on('lessons')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lessons');
    }
};
