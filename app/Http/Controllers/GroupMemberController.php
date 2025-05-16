<?php

namespace App\Http\Controllers;

use App\Http\Requests\GroupMemberRequest;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\User;
use Illuminate\Http\Request;

class GroupMemberController extends Controller
{

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $new_group_members = User::where('email_verified_at')->get();
        $group_members = GroupMember::latest()->paginate(10);
        return view('dashboard.pages.groups.members', [
            'group' => Group::findOrFail(3),
            'group_members' => $group_members,
            'new_group_members' => $new_group_members,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */        // return redirect()->back()->with('warnings', 'Features coming soon!');

    public function create()
    {
        return view('group-members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GroupMemberRequest $request)
    {

        // Get validated data
        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        // Check if user is a group member
        $userInGroup = GroupMember::where('user_id', $data['user_id'])
            ->where('group_id', $data['group_id'])
            ->first();
        if($userInGroup){
            return redirect()->back()->with('error', 'User is already a group member');
        }

        // return $data;
        $group_members = GroupMember::create($data);
        return redirect()->back()->with('success', 'group member added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(GroupMember $groupMember)
    {

        // $new_group_members = User::where('email_verified_at')->get();
        // return view('group-members.index', [
        //     'group_members' => $groupMember,
        //     'new_group_members' => $new_group_members,
        // ]);

        // return view('group-members.index', ['group_member' => $groupMember]);
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GroupMember $groupMember)
    {
        // return view('group-members.index', compact('group_members'));
        return redirect()->back();
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
        return redirect()->back()->with('success', 'group member removed successfully');

    }

    /**
     * Display a listing of the group members.
     */
    public function getGroupMembers(Group $group)
    {


        // return request()->user()->groups->contains($group);
        // if user is not admin or group head and not a group member, redirect to dashboard
        if(!(request()->user()->role === \App\Enum\UserRoleEnum::ADMIN ||
            in_array(request()->user()->activeRole() ?? request()->user()->role, [
                \App\Enum\UserRoleEnum::SUPERADMIN->value,
                \App\Enum\UserRoleEnum::ADMIN->value,
                \App\Enum\UserRoleEnum::GROUPHEAD->value]) ||
            request()->user()->groups->contains($group))
        ){
            return redirect()->back()->with('error', 'You are not authorized to view this page');
        }

        // Get users who are not members of the group
        $new_group_members = User::whereNotNull('email_verified_at')
            ->whereNotIn('id', function ($query) use ($group) 
            {
                $query->select('user_id')
                ->from('group_members')
                ->where('group_id', $group->id);
            })
            ->get();
        // $new_group_members = User::all();
        // $new_group_members = User::where('email_verified_at')->get();
        $group_members = GroupMember::where('group_id', $group->id)
            ->latest()->paginate(10);
        return view('dashboard.pages.groups.members', [
            'group' => $group,
            'group_members' => $group_members,
            'new_group_members' => $new_group_members,
        ]);

    }   
    
    
    public function getAllGroupMembers(Group $group)
    {
        // Get users who are not members of the group
        $non_group_members = User::whereNotIn('id', function ($query) use ($group) {
            $query->select('user_id')
                ->from('group_members')
                ->where('group_id', $group->id);
        })->get();

        // Get users who are members of the group
        $group_members = GroupMember::where('group_id', $group->id)
            ->latest()->paginate(10);

        return view('dashboard.pages.groups.members', [
            'group' => $group,
            'group_members' => $group_members,
            'new_group_members' => $non_group_members, // Users not in the group
        ]);
    }
    
}
