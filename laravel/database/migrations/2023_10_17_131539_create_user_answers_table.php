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
        Schema::create('user_answers', function (Blueprint $table) {
            $table->id();
            $table->text('value')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('question_response_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','user_answers_users_idx');
            $table->index('question_id','user_answers_questions_idx');
            $table->index('question_response_id','user_answer_question_responses_idx');

            $table->foreign('user_id','user_answer_users_fk')
                ->on('users')
                ->references('id');
            $table->foreign('question_id','user_answers_questions_fk')
                ->on('questions')
                ->references('id');
            $table->foreign('question_response_id','user_answer_question_responses_fk')
                ->on('question_responses')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answers');
    }
};
