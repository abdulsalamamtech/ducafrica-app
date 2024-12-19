<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupMemberRequest;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupMemberController extends Controller
{

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group_members = GroupMember::latest()->paginate(10);
        return view('dashboard.pages.groups.members', ['group_members' => $group_members]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupMemberRequest $request)
    {

        return redirect()->back()->with('warnings', 'Features coming soon!');

        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        $group_members = GroupMember::create($data);
        return redirect()
            ->route('group-members.index')
            ->with('success', 'group member added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupMember $groupMember)
    {
        return view('group-members.index', compact('groupMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupMember $groupMember)
    {
        return view('group-members.edit', compact('group_members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GroupMemberRequest $request, GroupMember $groupMember)
    {

        return redirect()->back()->with('warnings', 'Features coming soon!');

        $groupMember->update($request->validated());
        return redirect()
            ->route('group-members.index')
            ->with('success', 'group member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GroupMember $groupMember)
    {
        $groupMember->delete();
        return redirect()->route('group-member.index');
    }

    
}
