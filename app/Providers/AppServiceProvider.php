<?php

namespace App\Providers;

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
            // if(!auth()->user()){
            //     return redirect()->back()->with('error', 'please login');
            // }
            // return true to allow viewing the Log Viewer.
            // return ($request?->user()?->role == 'admin') ?? $request->user()
            // && in_array($request?->user()?->email, [
            //     'abdulsalamamtech@gmail.com',
            // ]);
            return true;
        });
    }
}
