<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookedEvent extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'event_id',
        'payment_type', 'approved_by',
        'payment_amount', 'status', 'paid'
    ];

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }


    public function transactions(){
        return $this->hasMany(Transaction::class, 'booked_event_id');
    }

    public function installment(){
        $booked_event = $this;
        $instalment = UserInstallment::where('booked_event_id', $booked_event->id)->first();
        if($instalment){
            return $instalment;
        }
        return;
    }
}
