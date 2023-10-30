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
        Schema::create('user_progresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('finished');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','user_progresses_users_idx');
            $table->index('lesson_id','user_progresses_lessons_idx');
            $table->index('course_id','user_progresses_courses_idx');

            $table->foreign('user_id','user_progresses_users_fk')
                ->on('users')
                ->references('id');
            $table->foreign('lesson_id','user_progresses_lessons_fk')
                ->on('lessons')
                ->references('id');
            $table->foreign('course_id','user_progresses_courses_fk')
                ->on('courses')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_progresses');
    }
};
