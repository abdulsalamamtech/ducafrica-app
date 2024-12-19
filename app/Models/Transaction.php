<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'booked_event_id',  // foreign key relationships with booked event
        'amount',
        'reference',
        'payment_url', 'psp', // payment service provider name
        'payment_status', // payment service provider status
        'currency', 'mode', 'status'
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookedEvent(){
        return $this->belongsTo(BookedEvent::class, 'booked_event_id');
    }
}
