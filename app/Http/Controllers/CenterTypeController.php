<?php

namespace App\Http\Controllers;

use App\Http\Requests\CenterTypeRequest;
use App\Models\CenterType;
use Illuminate\Http\Request;

class CenterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $CenterType = CenterType::latest()->paginate(10);
        return view('dashboard.pages.centers.types', ['center_types' => $CenterType]);

    }


        /**
     * Store a newly created resource in storage.
     */
    public function store(CenterTypeRequest $request)
    {
        $data = $request->validated();
        $data['added_by'] = $request->user()->id;

        $CenterType = CenterType::create($data);
        return redirect()
            ->route('center-types.index')
            ->with('success', 'center type added successfully');
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(CenterTypeRequest $request, CenterType $CenterType)
    {
        $CenterType->update($request->validated());
        return redirect()
            ->route('center-types.index')
            ->with('success', 'center type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CenterType $CenterType)
    {
        $CenterType->delete();
        return redirect()->route('center-types.index');
    }
}
