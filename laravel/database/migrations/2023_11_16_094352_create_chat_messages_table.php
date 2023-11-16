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
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id');
            $table->string('message');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('sent_at');
            $table->timestamps();
            $table->softDeletes();

            $table->index('chat_id','chat_messages_chats_idx');
            $table->index('user_id','chat_messages_users_idx');

            $table->foreign('chat_id','chat_messages_chats_fk')->on('chats')->references('id');
            $table->foreign('user_id','chat_messages_users_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_messages');
    }
};
