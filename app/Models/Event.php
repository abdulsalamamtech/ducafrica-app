<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'added_by',
        'center_id',
        'event_type_id',
        'name',
        'description',
        'start_date',
        'end_date',
        'type',
        'cost',
        'slots',
        'status',
        'contact_name',
        'contact_phone_number'
    ];

    protected function casts(): array
    {
        return [
            'end_date' => 'datetime',
            'start_date' => 'datetime',
        ];
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class, 'event_type_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by');
    }


    public function eventRoles()
    {
        return $this->belongsToMany(Role::class, 'event_roles', 'event_id', 'role_id');
    }


    public function center()
    {
        return $this->belongsTo(Center::class);
    }


    public function bookedEvents()
    {
        return $this->hasMany(BookedEvent::class, 'event_id');
    }

    public function transactions()
    {
        return $this->hasManyThrough(Transaction::class, BookedEvent::class);
    }




    public function eventRoleExist($id){
        $exists = Event::whereHas('eventRoles', function ($query) use ($id) {
            $query->where('id', $id);
        })->exists();
    }


    // Check if the event is available
    public function isAvailable(){
        // Some order logic is required
        return $this->slots >= $this->allBookedEvents()->count();

        // $events = Event::where('id', $this->id)->where('start_date', '<=', now())
        // ->where('end_date', '>=', now())
        // ->where('slots', '>', $this?->allBookedEvents()??0)
        // ->whereNotNull('status')->first();

        return $events;

    }

    // Check if the event has reached its maximum limit
    //  ($event->slots - ($event->allBookedEvents()->count() + 9)) >= 0 ? $event->slots - ($event->allBookedEvents()->count()): 0 
    public function availableSlotsLimit(){
        $availableSlots = ($this->slots - $this->allBookedEventWithPayment());
        return ($availableSlots >= 0)? $availableSlots : 0;
    }

    // Check if the user has already booked the event
    public function isBooked(){
        return $this->getBookedEvent()?->count() > 0;
    }


    // Get the booked event for the user
    public function getBookedEvent(){
        $user = Auth::user();
        $event_id = $this->id;
        $booked_event = BookedEvent::where('user_id', $user->id)
            ->where('event_id', $event_id)->first();
        return $booked_event;
    }


    // Get all booked events for a given event
    public function allBookedEvents(){
        $event_id = $this->id;
        $booked_event = BookedEvent::where('event_id', $event_id)->get();
        if($booked_event){
            return $booked_event;
        }
        return;
    }


    // Get all booked events for a given event that have been paid for
    public function allBookedEventsPaid(){
        if($this->allBookedEvents()){
            return $this->allBookedEvents()->where('paid');
        }
        return 0;
    }


    public function allBookedEventWithPayment(){
        $trans = $this->transactions()
            ->where('amount', '>', 0)
            ->where('payment_status', 'success')
            // ->groupBy('booked_event_id')
            // distinct worked well
            ->distinct('user_id');
            // info(json_decode($trans));
            info($trans);
            // info($this . ' confirmed booking ' . $trans);
        return $trans;
    }

    public function confirmedBookings(){
        $event_id = $this->id;
        $conf = BookedEvent::where('event_id', $event_id)
        ->whereHas('transactions', function ($query) {
            $query->where('amount', '>', 0)
            ->where('payment_status', 'success')
            ->distinct('user_id');
        })->get();
        // $conf = BookedEvent::where('event_id', $event_id)
        // ->transactions
        //     ->where('amount', '>', 0)
        //     ->where('payment_status', 'success')
        //     ->distinct('booked_event_id')->get();
        return $conf;
    }

    // Get user transactions for a specific event
    public function getTransactions(){
        $user = Auth::user();
        $event_id = $this->id;
        $booked_event = $this->getBookedEvent();
        $transactions = Transaction::where('user_id', $user->id)
            ->where('booked_event_id', $booked_event?->id)
            ->latest()->paginate();
        return $transactions;
    }


    // Check if user has completely paid for an event
    public function isPaid(){
        $user = Auth::user();
        $event_id = $this->id;
        $booked_event = $this->getBookedEvent();

        if($booked_event?->payment_type == 'full_payment'){
            $transactions = Transaction::where('user_id', $user->id)
                ->where('booked_event_id', $booked_event->id)
                ->where('payment_status', 'success')
                ->first();
            return $transactions;
        }

        if($booked_event?->payment_type == 'installment'){
            return $this->getPaymentDetails()['payment_status'];
        }

        return;
    }


    // Get payment details for an event amount, balance and refund
    public function getPaymentDetails(){
        $booked_event = $this->getBookedEvent();
        $details['payment_amount'] = $booked_event?->payment_amount;
        $details['payment_type'] = $booked_event?->payment_type;

        $details['amount_paid'] = $booked_event?->transactions->where('payment_status', 'success')->sum('amount');
        $details['balance'] =  ((float) $booked_event?->payment_amount - (float) $details['amount_paid']);
        // $details['payment_completed'] = ($details['amount_paid'] >= $details['payment_amount']) ? "true" : "false";
        $details['payment_status'] = ($details['amount_paid'] >= $details['payment_amount']) ? true : false;
        $details['refund'] = (($details['amount_paid'] > $details['payment_amount'] ? $details['amount_paid'] - $details['payment_amount'] : 0));

        if($booked_event && $details){
            // return json_encode($details);
            return ($details);
        }
        return;
    }



}
