<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageReply extends Model
{
        use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'message_id',
        'message',
    ];

    public function message(){
        return $this->belongsTo(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
