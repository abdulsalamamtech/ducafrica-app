<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Models\Center;
use App\Models\CenterType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centers = Center::latest()->paginate(10);
        $center_types = CenterType::latest()->get();

        // $local_councils = User::where()->latest()->get();
        // $local_councils = Role::orWhere('name', UserRoleEnum::SUPERADMIN)
        //     ->orWhere('name', UserRoleEnum::ADMIN)
        //     ->orWhere('name', UserRoleEnum::LOCALCOUNCIL)
        //     ->latest()->get();

        $local_councils = User::whereHas('roles', function($role) {
            $role->orWhere('name', UserRoleEnum::SUPERADMIN)
            ->orWhere('name', UserRoleEnum::ADMIN)
            ->orWhere('name', UserRoleEnum::LOCALCOUNCIL);
        })->get();



        // return $local_councils;
        

        return view('dashboard.pages.centers.index', [
            'centers' => $centers,
            'center_types' => $center_types,
            'local_councils' => $local_councils
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
    public function store(StoreCenterRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        $center = Center::create($data);
        return redirect()
            ->route('centers.index')
            ->with('success', 'center added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Center $center)
    {
        return view('dashboard.pages.centers.show', ['center' => $center]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(StoreCenterRequest $request, Center $center)
    {

        // return [$request->all(), $center];

        $center->update($request->validated());
        return redirect()
            ->route('centers.index')
            ->with('success', 'center updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {
        //
    }
}
