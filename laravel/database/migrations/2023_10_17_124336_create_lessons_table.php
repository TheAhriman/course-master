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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->mediumText('description');
            $table->unsignedBigInteger('course_id');
            $table->unsignedSmallInteger('priority');
            $table->timestamps();
            $table->softDeletes();

            $table->index('course_id','lessons_courses_idx');
            $table->foreign('course_id','lessons_courses_fk')
                ->on('courses')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
