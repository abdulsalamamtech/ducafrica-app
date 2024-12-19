<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInstallmentPayment extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'transaction_id',
        'user_installment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookedEvent()
    {
        return $this->belongsTo(BookedEvent::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function userInstallment()
    {
        return $this->belongsTo(UserInstallment::class);
    }
}
