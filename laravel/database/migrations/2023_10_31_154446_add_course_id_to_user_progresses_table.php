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
        Schema::table('user_progresses', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');

            $table->index('course_id','user_progresses_courses_idx');
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
        Schema::table('user_progresses', function (Blueprint $table) {
            //
        });
    }
};
