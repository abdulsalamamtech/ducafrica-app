<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
        $users = User::latest()->paginate(10);
        return view('dashboard.pages.users.index', [
            'users' => $users,
            'available_roles' => UserRoleEnum::cases()
        ]);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate(
            [
                'role' => ['required', 'string', 'in:'. implode(',', UserRoleEnum::getValues())],
                'status' => ['required', 'string'],
            ]
        );

        $user->update(['status' => ($data['status'] == 'active') ? 'active' : 'pending']);

        $userRole = Role::where('name', $data['role'])?->first();
        if(!$userRole){
            return redirect()->back()->with('error', $data['role'] . ' role has not been updated on the database');
        }

        $user->roles()->sync($userRole?->id);
        return redirect()->back()->with('success', 'user details updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

    /**
     *  Restore user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        User::where('id', $id)->withTrashed()->restore();

        return redirect()->route('users.index', ['status' => 'archived'])
            ->withSuccess(__('User restored successfully.'));
    }


    /**
     * Force delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        User::where('id', $id)->withTrashed()->forceDelete();

        return redirect()->route('users.index', ['status' => 'archived'])
            ->withSuccess(__('User force deleted successfully.'));
    }


    /**
     * Restore all archived users
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreAll()
    {
        User::onlyTrashed()->restore();

        return redirect()->route('users.index')->withSuccess(__('All users restored successfully.'));
    }


    public function newUsers()
    {
        $users = User::where('status', 'pending')->orWhereNull('email_verified_at')->latest()->paginate(10);
        return view('dashboard.pages.users.new', [
            'users' => $users,
            'available_roles' => UserRoleEnum::cases()
        ]);
    }


    public function searchUser(Request $request)
    {

        $search = $request->validate([
            'search' => ['required','string']
        ]);
        

        return($search);

        // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
        // $users = User::whereAny([
        //     'name',
        //     'email',
        //     'phone',
        // ], 'like', "%$search%")->latest()->paginate();



        $users = User::whereAny([
            'name',
            'email',
            'phone',
        ], 'like', '%$search%')->get();

        dd($users, $search);

        if(!$users){

            return view('dashboard.pages.users.index', [
                'users' => $users,
                'available_roles' => UserRoleEnum::cases()
            ])->with('error', 'user not found!');
        }

        return view('dashboard.pages.users.index', [
            'users' => $users,
            'available_roles' => UserRoleEnum::cases()
        ])->with('success', 'successful');

    }
}
