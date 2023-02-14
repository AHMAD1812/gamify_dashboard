<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chat_id')->constrained('chats')->onDelete('cascade');
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            $table->longText('message');
            $table->enum('type', ['text', 'image', 'multi_images', 'video', 'audio_call', 'video_call'])->default('text')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('sender_deleted')->default(0);
            $table->boolean('receiver_deleted')->default(0);
            $table->longText('file_path')->nullable();
            $table->string('poster')->nullable();
            $table->boolean('is_message_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_messages');
    }
}
