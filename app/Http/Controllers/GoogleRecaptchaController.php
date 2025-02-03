<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleRecaptchaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('google-recaptcha.index');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' =>'required|string|max:50',
            'email' =>'required|email|max:50',
            'g-recaptcha-response' => 'required|captcha'
            // Add more fields as needed
        ]);

        return $data;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
