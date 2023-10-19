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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('string');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('lesson_id','examinations_lessons_idx');
            $table->foreign('lesson_id','examinations_lessons_fk')
                ->on('lessons')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
