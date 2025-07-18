<?php

namespace App\Providers;

use App\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Gate;
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
        // LogViewer configuration
        LogViewer::auth(function ($request) {
            info('LogViewer Auth', [
                'time' => now(),
                'user' => $request?->user(),
                'role' => $request?->user()?->role,
            ]);
            return ($request->user() && in_array(
                $request->user()->email,
                ['abdulsalamamtech@gmail.com',]
            ));
        });

        // Admin dashboard
        view()->composer('dashboard.*', function ($view) {
            // Count messages where status is unread
            $unreadMessages = \App\Models\Message::where('status', 'unread')->count();
            $view->with('unreadMessages', $unreadMessages);
        });

        // Laravel pulse
        // Gate::define('viewPulse', function ($user) {
        //     return $user->isAdmin();
        // });
        Gate::define('viewPulse', function () {
            return true;
        });
    }
}
