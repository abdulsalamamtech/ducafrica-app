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

    public function event()
    {
        return $this->hasManyThrough(Event::class, BookedEvent::class);
    }


    public function getBookedEventTransactionAmount(){
        $bal = Transaction::where('user_id', $this->user?->id)
            ->where('booked_event_id', $this->bookedEvent?->id)
            ->where('payment_status', 'success')
            ->where('deleted_at', null)
            ->sum('amount');
        return $bal;
    }

    public function getBookedEventTransactionBalance(){
        // This function calculates the balance of the booked event transaction
        return $this->bookedEvent->payment_amount - $this->getBookedEventTransactionAmount();
    }
}
