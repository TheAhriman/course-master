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
        Schema::create('finished_examinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('examination_id');
            $table->unique(['user_id','examination_id']);
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id','finished_examinations_users_idx');
            $table->index('examination_id','finished_examinations_examinations_idx');

            $table->foreign('user_id','finished_examinations_users_fk')->on('users')->references('id');
            $table->foreign('examination_id','finished_examinations_examinations_fk')->on('examinations')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finished_examinations');
    }
};
