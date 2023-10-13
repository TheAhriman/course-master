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
        Schema::create('posts', function (Blueprint $table)
        {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->text('image');
            $table->unsignedBigInteger('user_id');
            $table->string('preview_description');
            $table->longText('description');
            $table->unsignedBigInteger('category_id');
            $table->date('date');
            $table->timestamps();
            $table->softDeletes();

            $table->index('category_id','post_category_idx');
            $table->index('user_id','post_user_idx');
            $table->foreign('user_id','post_user_fk')->on('users')->references('id');
            $table->foreign('category_id','post_category_fk')->on('categories')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
