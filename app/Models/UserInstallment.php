<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInstallment extends Model
{
    protected $fillable = [
        'user_id',
        'booked_event_id',
        'approved_by',
        'approved',
        'amount','paid', 'balance',
        'settle'
        // send pdf invoice to user through email
    ];


    public function approvedBy()
    {
        return $this->belongs(User::class, 'approved_by');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function bookedEvent()
    {
        return $this->belongsTo(BookedEvent::class, 'booked_event_id');
    }
}
