<?php

namespace App\Http\Controllers;

use App\Models\BookedEvent;
use App\Models\Center;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
// use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\Facades\FastExcel;

class FastExcelController extends Controller
{

    private function fileName($name = 'file'){
        return $name . '-export-' . now() . '.xlsx';
    }

    // public function centers()
    // {
    //     $center = Center::with(['centerType'])->get();
        
    //     return FastExcel::data($center)->download('centers.xlsx');
    // }


    // Export Users data
    public function users()
    {
        $users = User::all();
        
        return FastExcel::data($users)->download('users.xlsx');
    }


    // Export Center data
    public function centers()
    {
        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('centers');

        $center = Center::with(['centerType'])->get();

        return FastExcel::data($center)->download($file_name , function ($center) {
            return [
                'id' => $center->id,
                'name' => $center->name,
                'type' => $center->centerType->name,
                'payment_id' => $center->payment_id,
                'phone_number' => $center->phone_number,
                'address' => $center->address,
                'map_url' => $center->map_url,
                'state' => $center->state,
                'created_at' => $center->created_at->format('Y-m-d')
            ];
        });
    }

    // Export Event data
    public function events()
    {
        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('events');

        $data = Event::with(['eventType', 'center'])->get();

        return FastExcel::data($data)->download($file_name , function ($data) {
            // 'added_by',
            // 'center_id',
            // 'event_type_id',
            // 'name',
            // 'description',
            // 'start_date',
            // 'end_date',
            // 'type',
            // 'cost',
            // 'slots',
            // 'status',
            // 'contact_name',
            // 'contact_phone_number'
            return [
                'id' => $data->id,
                'name' => $data->name,
                'type' => $data->eventType->name,
                'description' => $data->description,
                'start_date' => $data->start_date->format('Y-m-d'),
                'end_date' => $data->end_date->format('Y-m-d'),
                'cost' => $data->cost,
                'slots' => $data->slots,
                'contact_name' => $data->contact_name,
                'contact_phone_number' => $data->contact_phone_number,
                'address' => $data->center?->address,
                'map_url' => $data->center?->map_url,
                'state' => $data->center?->state,
                'created_at' => $data->created_at->format('Y-m-d')
            ];
            return $data;
        });
    }


    // Export Event data
    public function bookedEvents()
    {
        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('booked-events');

        $data = BookedEvent::with(['user','event.eventType', 'event.center'])->get();

        return FastExcel::data($data)->download($file_name , function ($data) {
            return [
                'id' => $data->id,
                'user_id' => $data->user_id,
                'first_name' => $data->user->first_name,
                'last_name' => $data->user->last_name,
                'email' => $data->user->email,
                'phone_number' => $data->user->phone,
                'payment_type' => $data->payment_type, 
                'payment_amount' => $data->payment_amount, 
                'cost' => $data->event->cost,
                'slots' => $data->event->slots,
                'status' => $data->status, 
                'paid' => $data->paid ? 'successful' : 'pending',
                'event_name' => $data->event->name,
                'type' => $data->event->eventType->name,
                'description' => $data->event->description,
                'contact_name' => $data->event->contact_name,
                'contact_phone_number' => $data->event->contact_phone_number,
                'address' => $data->event->center?->address,
                'map_url' => $data->event->center?->map_url,
                'state' => $data->event->center?->state,
                'start_date' => $data->event->start_date->format('Y-m-d'),
                'end_date' => $data->event->end_date->format('Y-m-d'),
                'created_at' => $data->created_at->format('Y-m-d')
            ];
            return $data;
        });
    }  
    
    

    // Export Booked Event Users data
    public function bookedEventUsers(Event $event)
    {
        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('booked-event-users');

        $data = BookedEvent::where('event_id', $event->id)
            ->with(['user','event.eventType', 'event.center'])
            ->get();

        return FastExcel::data($data)->download($file_name , function ($data) {
            return [
                'id' => $data->id,
                'user_id' => $data->user_id,
                'first_name' => $data->user->first_name,
                'last_name' => $data->user->last_name,
                'email' => $data->user->email,
                'phone_number' => $data->user->phone,
                'payment_type' => $data->payment_type, 
                'payment_amount' => $data->payment_amount, 
                'cost' => $data->event->cost,
                'slots' => $data->event->slots,
                'status' => $data->status, 
                'paid' => $data->paid ? 'successful' : 'pending',
                'event_name' => $data->event->name,
                'type' => $data->event->eventType->name,
                'description' => $data->event->description,
                'contact_name' => $data->event->contact_name,
                'contact_phone_number' => $data->event->contact_phone_number,
                'address' => $data->event->center?->address,
                'map_url' => $data->event->center?->map_url,
                'state' => $data->event->center?->state,
                'start_date' => $data->event->start_date->format('Y-m-d'),
                'end_date' => $data->event->end_date->format('Y-m-d'),
                'created_at' => $data->created_at->format('Y-m-d')
            ];
            return $data;
        });
    } 

    public function transactions()
    {

        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('transactions');

        $data = Transaction::with(['user','bookedEvent.event.eventType', 'bookedEvent.event.center'])->get();

        return FastExcel::data($data)->download($file_name , function ($data) {
            return [
                'id' => $data->id,
                'user_id' => $data->user_id,
                'booked_event_id' => $data->booked_event_id,
                'first_name' => $data->user->first_name,
                'last_name' => $data->user->last_name,
                'email' => $data->user->email,
                'phone_number' => $data->user->phone,

                'amount' => $data->payment_amount,
                'currency' => $data->currency,
                'payment_url' => $data->payment_url,
                'reference' => $data->reference,
                'psp' => $data->psp,
                'mode' => $data->mode,
                'payment_status' => $data->payment_status,
                'status' => $data->status ? 'successful' : 'pending',

                'payment_type' => $data->bookedEvent->payment_type, 
                'payment_amount' => $data->bookedEvent->payment_amount, 
                'cost' => $data->bookedEvent->event->cost,
                'slots' => $data->bookedEvent->event->slots,
                'status' => $data->bookedEvent->status, 
                'paid' => $data->bookedEvent->paid ? 'successful' : 'pending',
                'event_name' => $data->bookedEvent->event->name,
                'type' => $data->bookedEvent->event->eventType->name,
                'description' => $data->bookedEvent->event->description,
                'contact_name' => $data->bookedEvent->event->contact_name,
                'contact_phone_number' => $data->bookedEvent->event->contact_phone_number,
                'address' => $data->bookedEvent->event->center?->address,
                'map_url' => $data->bookedEvent->event->center?->map_url,
                'state' => $data->bookedEvent->event->center?->state,
                'start_date' => $data->bookedEvent->event->start_date->format('Y-m-d'),
                'end_date' => $data->bookedEvent->event->end_date->format('Y-m-d'),
                'created_at' => $data->created_at->format('Y-m-d')
            ];
            return $data;
        });
    }


    // Export Event data
    public function bookedEventTransactions(Event $event)
    {
        // $file_name = $this->fileName('centers');
        $file_name = $this->fileName('booked-event-transactions');

        // Get event transactions
        $trans = $event->transactions;
        $data = $trans->load(['user','bookedEvent.event.eventType', 'bookedEvent.event.center']);

        return FastExcel::data($data)->download($file_name , function ($data) {
            return [
                'id' => $data->id,
                'user_id' => $data->user_id,
                'booked_event_id' => $data->booked_event_id,
                'first_name' => $data->user->first_name,
                'last_name' => $data->user->last_name,
                'email' => $data->user->email,
                'phone_number' => $data->user->phone,

                'amount' => $data->payment_amount,
                'currency' => $data->currency,
                'payment_url' => $data->payment_url,
                'reference' => $data->reference,
                'psp' => $data->psp,
                'mode' => $data->mode,
                'payment_status' => $data->payment_status,
                'status' => $data->status ? 'successful' : 'pending',

                'payment_type' => $data->bookedEvent->payment_type, 
                'payment_amount' => $data->bookedEvent->payment_amount, 
                'cost' => $data->bookedEvent->event->cost,
                'slots' => $data->bookedEvent->event->slots,
                'status' => $data->bookedEvent->status, 
                'paid' => $data->bookedEvent->paid ? 'successful' : 'pending',
                'event_name' => $data->bookedEvent->event->name,
                'type' => $data->bookedEvent->event->eventType->name,
                'description' => $data->bookedEvent->event->description,
                'contact_name' => $data->bookedEvent->event->contact_name,
                'contact_phone_number' => $data->bookedEvent->event->contact_phone_number,
                'address' => $data->bookedEvent->event->center?->address,
                'map_url' => $data->bookedEvent->event->center?->map_url,
                'state' => $data->bookedEvent->event->center?->state,
                'start_date' => $data->bookedEvent->event->start_date->format('Y-m-d'),
                'end_date' => $data->bookedEvent->event->end_date->format('Y-m-d'),
                'created_at' => $data->created_at->format('Y-m-d')
            ];
            return $data;
        });
    }      
}
