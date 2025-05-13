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
            // if(!auth()->user()){
            //     return redirect()->back()->with('error', 'please login');
            // }
            info('LogViewer Auth', [
                'user' => request()?->user(),
                'role' => request()?->user()?->role,
            ]);
            // return true to allow viewing the Log Viewer.
            return (request()?->user()?->role == UserRoleEnum::ADMIN) ?? request()?->user()
            || in_array(request()?->user()?->email, [
                'abdulsalamamtech@gmail.com',
            ]);
        });
    }
}
