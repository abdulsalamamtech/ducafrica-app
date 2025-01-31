<?php

namespace App\Http\Controllers;

use App\Enum\UserRoleEnum;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Models\Center;
use App\Models\CenterAsset;
use App\Models\CenterType;
use App\Models\Role;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Search for centers
        if(request()->filled('search')){
            $search = request()->validate([
                'search' => ['required','string']
            ]);
            $centers = $this?->search($search);
        }
        else
        {
            $centers = Center::with(['CenterAsset'])->latest()->paginate(10);
        }
        
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
     * Search for events
     */
    private function search($search){
        
        $centers = Center::whereAny([
            'added_by',
            'center_type_id',
            'belongs_to_user',
            'name',
            'payment_id',
            'phone_number',
            'address',
            'map_url',
            'state',
        ], 'like', '%' .$search['search'] .'%')
        ->with(['CenterAsset'])
        ->latest()
        ->paginate()->withQueryString();

        return $centers ?? null;
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

        if(!$request->has('belongs_to_user')){
            $data['belongs_to_user'] = $request->user()->id;
        }

        $center = Center::create($data);


        // Check if the image is uploaded
        if($request->hasFile('image')){
            $validateRequest = $request->image;

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('ducafrica/assets');
            $url = $cloudinaryImage->getSecurePath();
            $public_id = $cloudinaryImage->getPublicId();
            
            // Add assets
            $picture = CenterAsset::updateOrCreate(
                ['center_id' => $center->id], 
                [
                    'center_id' => $center->id, 
                    'url' => $url,
                    'file_id' => $public_id,
                    'hosted_at' => 'cloudinary',
                    'size' => $cloudinaryImage->getSize(),
                ]
            );

            Log::info("store center message: ", [$request, $center, $validateRequest, $cloudinaryImage, $picture]);
        }

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

        $data = $request->validated();
        if(!$request->has('belongs_to_user')){
            $data['belongs_to_user'] = $request->user()->id;
        }

        $center->update($data);

        // Check if the image is uploaded
        if($request->hasFile('image')){
            $validateRequest = $request->image;

            $cloudinaryImage = $request->file('image')->storeOnCloudinary('ducafrica/assets');
            $url = $cloudinaryImage->getSecurePath();
            $public_id = $cloudinaryImage->getPublicId();
            

            // Check if file exists
            $file_id = $center?->centerAsset?->file_id;
            if($file_id){
                $exists = Storage::disk('cloudinary')->fileExists($file_id);
                if ($exists && $file_id) {
                    // Delete old file from cloudinary
                    Cloudinary::destroy($file_id);
                }
            }

            // Add assets
            $picture = CenterAsset::updateOrCreate(
                ['center_id' => $center->id], 
                [
                    'center_id' => $center->id, 
                    'url' => $url,
                    'file_id' => $public_id,
                    'hosted_at' => 'cloudinary',
                    'size' => $cloudinaryImage->getSize(),
                ]
            );


        }
        
        return redirect()
            ->route('centers.index')
            ->with('success', 'center updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Center $center)
    {

        $center->delete();
        return redirect()->route('centers.index')
        ->with('success', 'center deleted successfully');
    }
}
