<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookedEventRequest;
use App\Http\Requests\UpdateBookedEventRequest;
use App\Models\BookedEvent;
use App\Models\Center;
use App\Models\Event;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class BookedEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Search for events
        if(request()->filled('search')){
            $search = request()->validate([
                'search' => ['required','string']
            ]);
            $bookedEvents = $this?->searchBookedEvents($search);
        }
        else
        {
            $bookedEvents = bookedEvent::with(['event', 'user'])->latest()->paginate(4);
        }


        $events = Event::with(['eventRoles'])->latest()->paginate(5);
        $centers = Center::all();
        $roles = Role::all();

        return view('dashboard.pages.events.booked', [
            'booked_events' => $bookedEvents,
            'events' => $events,
            'centers' => $centers,
            'roles' => $roles,
        ]);
    }


    // Search booked events
    private function searchBookedEvents($search){

        $user = Auth::user();
        $booked_events = BookedEvent::whereAny([
            'user_id', 'event_id',
            'payment_type', 'approved_by',
            'payment_amount', 'status', 'paid',
        ], 'like', '%' .$search['search'] .'%')
        ->where('user_id', $user->id)
            ->with(['event', 'event.center'])
            ->latest()->paginate(5);

        return $booked_events ?? null;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookedEventRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookedEvent $bookedEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookedEvent $bookedEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookedEventRequest $request, BookedEvent $bookedEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookedEvent $bookedEvent)
    {
        //
    }



    public function myEvents()
    {
        $user = Auth::user();
        $bookedEvents = bookedEvent::where('user_id', $user->id)->with(['event', 'user'])->latest()->paginate(4);

        $events = Event::with(['eventRoles'])->latest()->paginate(5);
        $centers = Center::all();
        $roles = Role::all();

        return view('dashboard.pages.events.my-booked-events', [
            'booked_events' => $bookedEvents,
            'events' => $events,
            'centers' => $centers,
            'roles' => $roles,
        ]);
    }
}
