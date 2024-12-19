<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): RedirectResponse
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // Get validated parameters
        $data = $request->validated();
        $data['name'] = $data['last_name'] . " " . $data['first_name'];
        $data['diets'] = (!empty($data['diets']) && ($data['diets']=='others' || $data['diets']!=''))?
                        $data['other_diets']:
                        json_encode($data['diets']??'');

        // Store the user information
        $user = User::create($data);

        // $user->sendEmailVerificationNotification();


        Log::error(['register-new-user' => $data['email'] . " " . $data['state']]);

        event(new Registered($user));

        Auth::login($user);
        // dd($user, $data);

        return redirect(route('register-notice', absolute: false));
    }


        /**
     * Handle an incoming authentication request.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        // dd($user);

        if (!$user->email_verified_at){

            return redirect()->route('verification.verify');
        }

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
