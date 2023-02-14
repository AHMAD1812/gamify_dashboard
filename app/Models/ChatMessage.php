<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    public function chat() {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
    public function receiver() {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
