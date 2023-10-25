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
        Schema::create('category_courses', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('course_id');
            $table->softDeletes();

            $table->index('category_id','category_courses_categories_idx');
            $table->index('course_id','category_courses_courses_idx');

            $table->foreign('category_id','category_courses_categories_fk')
                ->on('categories')
                ->references('id');
            $table->foreign('course_id','category_courses_courses_fk')
                ->on('courses')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_courses');
    }
};
