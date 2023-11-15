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
        Schema::create('user_taken_examinations_questions', function (Blueprint $table) {
            $table->uuid('user_taken_examination_id');
            $table->unsignedBigInteger('question_id');

            $table->index('user_taken_examination_id','user_examination_questions_user_examinations_idx');
            $table->index('question_id','user_examination_questions_idx');

            $table->foreign('user_taken_examination_id','user_examination_questions_user_examinations_fk')
                ->on('user_taken_examinations')
                ->references('id');
            $table->foreign('question_id','user_examination_questions_fk')
                ->on('questions')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_taken_examinations_questions');
    }
};
