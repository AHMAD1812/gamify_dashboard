<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function getMessages() {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
    }
    public function last_message() {
        return $this->hasOne(ChatMessage::class, 'id', 'last_message_id');
    }
}
