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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->tinyText('title');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('about_course_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','course_user_idx');
            $table->index('about_course_id','course_about_course_idx');

            $table->foreign('user_id','course_user_fk')->on('users')->references('id');
            $table->foreign('about_course_id','course_about_course_fk')->on('about_courses')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cources');
    }
};
