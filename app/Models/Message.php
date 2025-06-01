<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'subject',
        'message',
        // Add any other fields required for your application
        'status', // Example field for message status
    ];


    public function messageReplies()
    {
        return $this->hasOne(MessageReply::class);
    }
}
