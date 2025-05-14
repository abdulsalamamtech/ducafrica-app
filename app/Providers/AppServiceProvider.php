<?php

namespace App\Providers;

use App\Enum\UserRoleEnum;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        LogViewer::auth(function ($request) {
            info('LogViewer Auth', [
                'time' => now(),
                'user' => $request?->user(),
                'role' => $request?->user()?->role,
            ]);
            if($request?->user() && in_array(
                $request?->user()?->email, 
                ['abdulsalamamtech@gmail.com']
            )){
                return true;
            }
            else{

                return redirect()->back()->with('error', 'You are not authorized to view this page');
            }
        });
    }
}
