<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTypeRequest;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $EventType = EventType::latest()->paginate(10);
        return view('dashboard.pages.events.types', ['event_types' => $EventType]);

    }


        /**
     * Store a newly created resource in storage.
     */
    public function store(EventTypeRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        $EventType = EventType::create($data);
        return redirect()
            ->route('event-types.index')
            ->with('success', 'event type added successfully');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(EventTypeRequest $request, EventType $EventType)
    {
        $EventType->update($request->validated());
        return redirect()
            ->route('event-type.index')
            ->with('success', 'event type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $EventType)
    {
        $EventType->delete();
        return redirect()->route('event-type.index');
    }
}
