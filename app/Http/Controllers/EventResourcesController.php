<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventResourceRequest;
use App\Http\Requests\UpdateEventResourceRequest;
use App\Models\Center;
use App\Models\Event;
use App\Models\EventResource;
use App\Models\EventType;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventResourcesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return request();
        // Search for events
        if (request()->filled('search')) {
            $search = request()->validate([
                'search' => ['required', 'string']
            ]);
            $event_resources = $this?->search($search);
        }else{
            $event_resources = EventResource::with(['roles'])->latest()->paginate(5);
        }

        // $event_resources = EventResource::with(['eventResourceRole'])->latest()->paginate(5);
        // return $event_resources = EventResource::with(['roles'])->latest()->paginate(5);
        // return $event_resources = EventResource::with(['eventResourceRole'])->latest()->paginate(5);


        $event_types = EventType::all();
        $centers = Center::all();
        $roles = Role::all();


        // $event->load(['eventRoles' => function ($query) use ($role) {
        //     $query->where('role_id', $role->id);
        // }]);
        // dd($events->eventRoles());

        return view('dashboard.pages.event-resources.index', [
            'event_resources' =>  $event_resources,
            'events' => $events = [],
            'event_types' => $event_types,
            'centers' => $centers,
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventResourceRequest $request)
    {
        $data = $request->validated();

        // return $data;

        $data['created_by'] = $request->user()->id;
        // return [$request->all(),  auth()->user()];
        // return $data;

        $event_resources = EventResource::create($data);
        if ($data['event_resource_roles']) {
            foreach ($data['event_resource_roles'] as $roleId) {
                // $event_resources->eventResourceRole()->attach($roleId);
                $event_resources->roles()->attach($roleId);
            }
        }


        # code...
        // Use singular: event_resource_role
        // Use belongsToMany()
        // $event = EventResource::find(1);
        // $event->roles()->attach([1, 2]); // Attach roles with ID 1 and 2
        // $event->roles()->detach([2]); // detach role
        // $event->roles()->sync([3, 4]); // Replaces existing with roles 3 and 4

        return redirect()
            ->route('event-resources.index')
            ->with('success', 'resource added successfully');


        // dd($event_resources);

        // return redirect()
        //     ->route('event-resources.index')
        //     ->with('success', 'resource added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventResource $eventResource)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventResource $eventResource)
    {
        return $this->index();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventResourceRequest $request, EventResource $eventResource)
    {

        $data = $request->validated();

        // return $data;
        $eventResource->update($data);
        // $eventResource->eventResourceRoles()->sync(array_values($data['event_resource_role']));
        $eventResource->roles()->sync(array_values($data['event_resource_roles']));

        return redirect()
            ->route('event-resources.index')
            ->with('success', 'resource updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventResource $eventResource)
    {
        $eventResource->delete();

        return $this->index();
        return redirect()
            ->route('event-resources.index')
            ->with('success', 'resource deleted successfully');
    }

    /**
     * Close an event resource
     */
    public function closeEventResource(Request $request, EventResource $eventResource)
    {

        // return $eventResource;
        $eventResource->status = false;
        $eventResource->save();

        return redirect()
            ->route('event-resources.index')
            ->with('success', 'event resource closed successfully');
    }

    /**
     * Open an event resource
     */
    public function openEventResource(Request $request, EventResource $eventResource)
    {

        // return $eventResource;
        $eventResource->status = true;
        $eventResource->save();

        return redirect()
            ->route('event-resources.index')
            ->with('success', 'event resource opened successfully');
    }

    // Get the list of available events
    public function available()
    {

        $event_resources = [];

        // Get the logged in user
        $user = Auth::user();

        // Search for events
        if (request()->filled('search')) {
            $search = request()->validate([
                'search' => ['required', 'string']
            ]);
            $events = $this?->searchAvailableEvents($search);
        } else {

            $userId = auth()->user()->id;
            $event_resources = EventResource::where('status', true)
                ->whereHas('roles', function ($role) {
                    $user = Auth::user();
                    $userRole = Role::where('name', $user?->activeRole())->first();
                    $role->Where('role_id', $userRole?->id);
                })
                ->orWhere('category', 'general')
                ->with(['roles'])
                ->latest()->paginate(9);
        }


        // return($event_resources);


        return view('dashboard.pages.event-resources.available', [
            'event_resources' =>  $event_resources,
        ]);
    }

    public function searchAvailableEvents($search)
    {
        $search = $search['search'];

        // Search for events
        $event_resources = EventResource::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('category', 'like', "%{$search}%")
            ->whereHas('roles', function ($role) {
                $user = Auth::user();
                $userRole = Role::where('name', $user?->activeRole())->first();
                $role->Where('role_id', $userRole?->id);
            })
            ->where('status', true)
            ->orWhere('category', 'general')
            ->with(['roles'])
            ->latest()->paginate(9);

        return $event_resources;
    }

    public function search($search)
    {
        $search = $search['search'];

        // Search for events
        $event_resources = EventResource::where('name', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('category', 'like', "%{$search}%")
            ->orWhere('created_by', 'like', "%{$search}%")
            ->with(['roles'])
            ->latest()->paginate(9);

        return $event_resources;
    }
}
