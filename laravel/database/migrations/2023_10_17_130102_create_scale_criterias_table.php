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
        Schema::create('scale_criterias', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->unsignedBigInteger('examination_id');
            $table->timestamps();
            $table->softDeletes();

            $table->index('examination_id','scale_criterias_examinations_idx');
            $table->foreign('examination_id','scale_criterias_examinations_fk')
                ->on('examinations')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scale_criterias');
    }
};
