<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Models\Event;
use App\Models\Group;
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

        if (!empty(request()->search)) {

            if (request()->filled('search')) {
                $query = request()->validate([
                    'search' => ['required', 'string']
                ]);
                $users = $this->search($query['search']);
            }
        } else {

            // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
            $users = User::latest()->paginate(10);
        }

        return view('dashboard.pages.users.index', [
            'users' => $users,
            'available_roles' => UserRoleEnum::cases()
        ]);
    }

    // Search users
    private function search($search)
    {
        $users = User::where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('state', 'like', '%' . $search . '%')
            ->orWhere('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhereHas('roles', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate();

        if (($users->count() > 0)) {
            session()->flash('success', 'successful');
            return $users;
        } else {
            session()->flash('error', 'No results found');
            return [];
        }
    }

    // Get new users
    public function newUsers()
    {

        if (!empty(request()->search)) {

            if (request()->filled('search')) {
                $query = request()->validate([
                    'search' => ['required', 'string']
                ]);
                $users = $this->search($query['search']);
            }
        } else {

            // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
            // $users = User::latest()->paginate(10);
            $users = User::where('status', 'pending')
                ->orWhereNull('email_verified_at')
                ->latest()->paginate(10);
        }

        return view('dashboard.pages.users.new', [
            'users' => $users,
            'available_roles' => UserRoleEnum::cases()
        ]);
    }


    // Search new users
    private function searchNewUsers($search)
    {
        $users = User::whereAny([
            'name',
            'email',
            'phone',
            'state',
            'first_name',
            'last_name',
        ], 'like', '%' . $search . '%')
            ->where('status', 'pending')
            ->orWhereNull('email_verified_at')
            ->latest()->paginate();

        if (($users->count() > 0)) {
            session()->flash('success', 'successful');
            return $users;
        } else {
            session()->flash('error', 'No results found');
            return [];
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('users.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // return redirect()->route('users.index')->with('success', 'successful!');
        return view('dashboard.pages.users.show', ['user' => $user->toArray() ?? null]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate(
            [
                'role' => ['required', 'string', 'in:' . implode(',', UserRoleEnum::getValues())],
                'status' => ['required', 'string'],
            ]
        );

        $user->update([
            'status' => ($data['status'] == 'active') ? 'active' : 'pending'
        ]);

        $userRole = Role::where('name', $data['role'])?->first();
        if (!$userRole) {
            return redirect()->back()->with('error', $data['role'] . ' role has not been updated on the database');
        }

        $user->roles()->sync($userRole?->id);
        // return redirect()->back()->with('success', 'user details updated successfully!');

        return redirect()->route('users.index')->with('success', 'user details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Check if user has booked any event
        if ($user->bookedEvents()->count()) {
            return redirect()->back()->with('error', 'Error, User has booked event!');
        }
        $user->delete();

        // return redirect()->route('users.index')
        //     ->withSuccess(__('User deleted successfully.'));

        return redirect()->route('users.index')->with('success', 'user deleted successfully!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function activities(User $user)
    {
        // User transactions
        $transactions = $user->transactions()->paginate();
        // return $transactions;

        $bookedEvents = $user->bookedEvents()->paginate();
        // return $bookedEvents;

        return view('dashboard.pages.users.activities', [
            'user' => $user,
            'bookedEvents' => $bookedEvents,
            'transactions' => $transactions,
        ]);
    }


    /**
     *  Restore user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(User $user)
    {
        User::where('id', $id)->withTrashed()->restore();

        return redirect()->route('users.index', ['status' => 'archived'])
            ->withSuccess(__('User restored successfully.'));
    }
    /**
     *  Restore user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyEmail(User $user)
    {
        $user->email_verified_at = now();
        $user->save();

        return redirect()->back()->with('success', 'Email verified successfully!');
    }

    /**
     * Force delete user data
     *
     * @param User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(User $user)
    {
        User::where('id', $user->id)->withTrashed()->forceDelete();

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


    // public function searchUser(Request $request)
    // {

    //     $search = $request->validate([
    //         'search' => ['required','string']
    //     ]);

    //     // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
    //     $users = User::whereAny([
    //         'name',
    //         'email',
    //         'phone',
    //         'state',
    //         'first_name',
    //         'last_name',
    //     ], 'like', '%' .$search['search'] .'%')->latest()->paginate()->withQueryString();

    //     session()->flash('success', 'successful');
    //     return view('dashboard.pages.users.index', [
    //         'users' => $users,
    //         'available_roles' => UserRoleEnum::cases()
    //         ]);

    // }

    // public function searchNewUser(Request $request)
    // {

    //     $search = $request->validate([
    //         'search' => ['required','string']
    //     ]);

    //     // return([UserRoleEnum::getValues(), UserRoleEnum::cases()]);
    //     $users = User::whereAny([
    //         'name',
    //         'email',
    //         'phone',
    //         'state',
    //         'first_name',
    //         'last_name',
    //     ], 'like', '%' .$search['search'] .'%')
    //     ->where('status', 'pending')
    //     ->orWhereNull('email_verified_at')
    //     ->latest()->paginate();

    //     session()->flash('success', 'successful');
    //     return view('dashboard.pages.users.new', [
    //         'users' => $users,
    //         'available_roles' => UserRoleEnum::cases()
    //         ]);

    // }

}
