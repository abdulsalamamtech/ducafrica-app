<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CancelEvent extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'booked_event_id',
        'user_id', 'amount_paid',
        'message', 'status',
        'approved_by', // id of the admin who approved the cancellation
        'refunded', // true or false by user
    ];

    public function bookedEvent()
    {
        return $this->belongsTo(BookedEvent::class, 'booked_event_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
