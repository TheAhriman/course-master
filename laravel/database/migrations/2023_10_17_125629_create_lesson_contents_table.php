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
        Schema::create('lesson_contents', function (Blueprint $table) {
            $table->id();
            $table->enum('media_type',[1,2,3]);
            $table->text('value');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('lesson_id','lesson_contents_lessons_idx');
            $table->foreign('lesson_id','lesson_contents_lessons_fk')
                ->on('lessons')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_contents');
    }
};
