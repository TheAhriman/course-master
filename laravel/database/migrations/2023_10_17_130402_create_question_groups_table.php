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
        Schema::create('question_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedSmallInteger('priority');
            $table->unsignedBigInteger('examination_id');
            $table->integer('questions_number')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index('examination_id','question_groups_examinations_idx');
            $table->foreign('examination_id','question_groups_examinations_fk')
                ->on('examinations')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_groups');
    }
};
