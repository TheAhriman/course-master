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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->enum('type',[1,2,3]);
            $table->unsignedSmallInteger('priority');
            $table->boolean('required');
            $table->unsignedBigInteger('question_group_id');
            $table->integer('score');
            $table->timestamps();
            $table->softDeletes();

            $table->index('question_group_id','questions_question_groups_idx');
            $table->foreign('question_group_id','questions_question_groups_fk')
                ->on('question_groups')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
