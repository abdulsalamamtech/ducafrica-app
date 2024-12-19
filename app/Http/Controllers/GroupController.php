<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::latest()->paginate(10);
        return view('dashboard.pages.groups.index', ['groups' => $groups]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        $group = Group::create($data);
        return redirect()
            ->route('groups.index')
            ->with('success', 'group added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $Group)
    {
        return view('groups.index', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupRequest $request, Group $group)
    {
        $group->update($request->validated());
        return redirect()
            ->route('groups.index')
            ->with('success', 'group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups.index');
    }

    public function myGroups()
    {
        // Get the logged in user
        $user = Auth::user();

        $groups = Group::latest()->paginate(10);
        return view('dashboard.pages.groups.my-groups', ['groups' => $groups]);

    }    
}
