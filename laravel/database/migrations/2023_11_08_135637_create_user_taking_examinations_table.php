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
        Schema::create('user_taken_examinations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('examination_id');
            $table->unsignedBigInteger('question_group_id');
            $table->enum('status',\App\Enums\TakingExaminationStatusTypeEnum::toArray());
            $table->dateTime('started_at')->nullable();
            $table->dateTime('finished_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','user_taking_examinations_users_idx');
            $table->index('examination_id','user_taking_examinations_examinations_idx');
            $table->index('question_group_id','user_taking_examinations_question_groups_idx');

            $table->foreign('user_id','user_taking_examinations_users_fk')->on('users')->references('id');
            $table->foreign('examination_id','user_taking_examinations_examinations_fk')->on('examinations')->references('id');
            $table->foreign('question_group_id','user_taking_examinations_question_groups_fk')->on('question_groups')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_taken_examinations');
    }
};
