<?php

use App\Http\Controllers\BookedEventController;
use App\Http\Controllers\CancelEventController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\EventAttendanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventResourcesController;
use App\Http\Controllers\EventRoleController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\FastExcelController;
use App\Http\Controllers\GoogleRecaptchaController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MessageRepliesController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Pdfs\GeneratePdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInstallmentController;
use App\Http\Controllers\UserInstallmentPaymentController;
use App\Http\Controllers\UserRoleController;
use App\Models\Center;
use App\Models\Event;
use App\Models\Role;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


















Route::get('/test-events', function () {
    // return view('welcome');
    $userId = auth()->user()->id;

    $filter = request()->query('filter');
    // $search = request()->query('search');
    // $sort = request()->query('sort');
    // $sortBy = request()->query('sortBy');
    // $sortBy = $sortBy ?? 'start_date';
    // $sort = $sort ?? 'asc';

    if (request()->filled('filter') && $filter == "type") {
        $events = Event::where('status', true)
            ->where('start_date', '<=', now())
            ->where('slots', '>', 0)
            ->where('end_date', '>=', now())
            ->whereHas('eventRoles', function ($role) {
                $user = Auth::user();
                $userRole = Role::where('name', $user?->activeRole())->first();
                $role->Where('role_id', $userRole?->id);
            })
            ->with(['center', 'center.centerAsset'])
            // ->whereHas('center.groups.groupMember', function ($query) use ($userId) {
            //     $query->where('user_id', $userId);
            // })
            ->groupBy('event_type_id')
            // ->latest()
            ->paginate(9);
        // return $events;
    } else if (request()->filled('filter') && $filter == "centers") {
        $events = Event::where('status', true)
            ->where('start_date', '<=', now())
            ->where('slots', '>', 0)
            ->where('end_date', '>=', now())
            ->whereHas('eventRoles', function ($role) {
                $user = Auth::user();
                $userRole = Role::where('name', $user?->activeRole())->first();
                $role->Where('role_id', $userRole?->id);
            })
            ->with(['center', 'center.centerAsset'])
            // ->whereHas('center.groups.groupMember', function ($query) use ($userId) {
            //     $query->where('user_id', $userId);
            // })
            ->groupBy('center_id')
            ->latest()
            ->paginate(9);
        // return $events;
    } else {

        $events = Event::where('end_date', '>=', now())
            // ->where('start_date', '<=', now())
            ->where('slots', '>', 0)
            ->where('status', true)
            ->whereHas('eventRoles', function ($role) {
                $user = Auth::user();
                $userRole = Role::where('name', $user?->activeRole())->first();
                $role->Where('role_id', $userRole?->id);
            })
            ->with(['center', 'center.centerAsset'])
            // ->whereHas('center.groups.groupMember', function ($query) use ($userId) {
            //     $query->where('user_id', $userId);
            // })
            ->latest()->paginate(9);
    }





    // return $events;
    return view('dashboard.pages.events.available', [
        'events' => $events,
    ]);
});










// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
// return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// Home page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Login page
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
// Register page
Route::get('/register', [App\Http\Controllers\HomeController::class, 'register'])->name('register');


Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [App\Http\Controllers\HomeController::class, 'termsConditions'])->name('terms-and-conditions');
Route::get('/register-success', [App\Http\Controllers\HomeController::class, 'registrationNotice'])->name('register-notice');
Route::get('/activate-account/{id}', [App\Http\Controllers\HomeController::class, 'activateAccount'])->name('activate-account');


Route::get('contact', [MessageController::class, 'create'])->name('message.create');
Route::post('contact', [MessageController::class, 'store'])->name('message.store');

// Newsletter
// Route::post('newsletters', [NewsletterController::class, 'store'])->name('newsletters.store');




// Route::resource('users', UserController::class);
// Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
// Route::post('/{user}/restore', 'UsersController@restore')->name('users.restore');
// Route::delete('/{user}/force-delete', 'UsersController@forceDelete')->name('users.force-delete');
// Route::post('/restore-all', 'UsersController@restoreAll')->name('users.restore-all');



Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('roles', RoleController::class)
        ->only(['index', 'store', 'update'])
        ->middleware(['role:super-admin|admin']);

    Route::resource('user-roles', UserRoleController::class);

    // Groups
    Route::resource('groups', GroupController::class)
        ->middleware(['role:super-admin|admin'])
        ->only(['index', 'store', 'update']);
    Route::delete('groups/{group}', [GroupController::class, 'destroy'])
        ->middleware(['role:super-admin|admin|group-head'])
        ->name('groups.delete');

    // Get group members
    Route::get('groups/{group}/members', [GroupMemberController::class, 'getGroupMembers'])
        ->middleware(['role:super-admin|admin|group-head'])
        ->name('groups.members');

    Route::get('/my-groups', [GroupController::class, 'myGroups'])
        ->middleware(['role:super-admin|admin|group-head'])
        ->name('my-groups.index');
    Route::get('my-groups/{group}/members', [GroupMemberController::class, 'getGroupMembers'])
        ->middleware(['role:super-admin|admin|group-head'])
        ->name('my-groups.members');

    Route::resource('group-members', GroupMemberController::class)
        ->only(['index', 'show', 'store', 'update']);
    Route::delete('group-members/{groupMember}', [GroupMemberController::class, 'destroy'])
        ->middleware(['role:super-admin|admin|group-head'])
        ->name('group-members.delete');

    // Centers
    Route::resource('center-types', CenterTypeController::class)
        ->only(['index', 'store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);

    Route::resource('centers', CenterController::class)
        ->only(['index', 'store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);

    // Center Groups
    // Add group to center
    Route::post('centers/{center}/groups', [CenterController::class, 'addGroup'])
        ->name('centers.groups.store');
    // Delete group from center
    Route::delete('centers/{center}/groups/{group}', [CenterController::class, 'removeGroup'])
        ->name('centers.groups.delete');

    // Delete a centerresources
    Route::delete('centers/{center}', [CenterController::class, 'destroy'])
        ->middleware(['role:super-admin|admin'])
        ->name('centers.delete');

    // Events
    Route::resource('event-types', EventTypeController::class)
        ->only(['index', 'store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);
    Route::resource('events', EventController::class)
        ->only(['index', 'show']);

    // Close an event
    Route::get('events/{event}/close', [EventController::class, 'closeEvent'])
        ->middleware(['role:super-admin|admin'])
        ->name('events.close');
    // Open an event
    Route::get('events/{event}/open', [EventController::class, 'openEvent'])
        ->middleware(['role:super-admin|admin'])
        ->name('events.open');
    // Event details
    Route::get('events/{event}/details', [EventController::class, 'eventDetails'])
        ->middleware(['role:super-admin|admin'])
        ->name('events.details');

    // Event Booked Users
    Route::get('events/{event}/booked-users', [EventController::class, 'bookedEventUsers'])
        ->middleware(['role:super-admin|admin'])
        ->name('events.bookedEventUsers');


    // Mark user as attend
    // Route::post('events/{event}/booked-users', [EventAttendanceController::class, 'store'])
    //     ->middleware(['role:super-admin|admin'])
    //     ->name('events.bookedEventUsers.store');  

    // Route::get('event-attendances', [EventAttendanceController::class, 'index']);
    // Route::get('event-attendances', [EventAttendanceController::class, 'index']);

    // mark event attendance
    Route::get('booked-events/{bookedEvent}/attend', [EventController::class, 'attend'])
        ->middleware(['role:super-admin|admin'])
        ->name('event-attendances.attend');
    Route::get('booked-events/{bookedEvent}/absent', [EventController::class, 'absent'])
        ->name('event-attendances.absent');





    // global search
    Route::get('/available-events-global-filter', [EventController::class, 'globalFilter'])
        ->name('available-events.global-filter');


    Route::resource('events', EventController::class)
        ->only(['store', 'update'])
        ->middleware(['role:super-admin|admin']);

    Route::get('/available-events', [EventController::class, 'available'])
        ->name('available-events');


    Route::get('/events/{event}/book', [EventController::class, 'book'])
        ->name('events.book');
    Route::get('/events/{event}/full-payment', [EventController::class, 'makeFullPayment'])
        ->name('events.full-payment');


    // Installments
    Route::resource('/user-installments', UserInstallmentController::class);
    Route::get('/user-installments/{userInstallment}/approve', [UserInstallmentController::class, 'approve'])
        ->name('user-installments.approve')
        ->middleware(['role:super-admin|admin']);
    Route::get('/user-installments/{userInstallment}/reject', [UserInstallmentController::class, 'reject'])
        ->name('user-installments.reject')
        ->middleware(['role:super-admin|admin']);

    Route::get('/pending-installment-requests', [UserInstallmentController::class, 'request'])
        ->name('pending-installments.request');


    // Route::get('pdfs/events/{event}/', [PdfController::class, 'event'])
    //     ->name('pdfs.events.print');
    Route::get('pdfs/events/{event}/', [GeneratePdfController::class, 'event'])
        ->name('pdfs.events.print');

    Route::post('/events/{event}/installment-payment', [EventController::class, 'makeInstallmentPayment'])
        ->name('events.installment-payment');

    Route::resource('booked-events', BookedEventController::class);
    Route::get('my-booked-events/', [BookedEventController::class, 'myEvents'])
        ->name('my-events');

    // Transactions
    Route::resource('transactions', TransactionController::class)
        ->middleware(['role:super-admin|admin']);
    Route::get('my-transactions/', [TransactionController::class, 'myTransactions'])
        ->name('my-transactions');


    // Users route
    Route::resource('users', UserController::class)
        ->middleware(['role:super-admin|admin']);
    // Delete a user
    Route::delete('users/{user}', [UserController::class, 'destroy'])
        ->middleware(['role:super-admin|admin', 'password.confirm'])
        ->name('users.destroy');

    // User activities route
    Route::get('users/{user}/activities', [UserController::class, 'activities'])
        ->middleware(['role:super-admin|admin'])
        ->name('users.activities');

    // User transaction activities
    Route::get('users/{user}/transaction-activities', [UserController::class, 'transactionActivities'])
        ->middleware(['role:super-admin|admin'])
        ->name('users.activities.transactions');

    // User group activities
    Route::get('users/{user}/group-activities', [UserController::class, 'groupActivities'])
        ->middleware(['role:super-admin|admin'])
        ->name('users.activities.groups');

    Route::any('/new-users', [UserController::class, 'newUsers'])
        ->name('new-users');

    Route::get('/users/{user}/verify-email', [UserController::class, 'verifyEmail'])->name('users.verify-email');


    // Messages routes
    Route::apiResource('messages', MessageController::class);
    // Message Reply routes
    Route::apiResource('message-replies', MessageRepliesController::class);

    Route::get('/available-resources', [EventResourcesController::class, 'available'])
        ->name('available-resources');
    Route::resource('event-resources', EventResourcesController::class)
        ->only(['index', 'show']);
    Route::resource('event-resources', EventResourcesController::class)
        ->only(['store', 'update'])
        ->middleware(['role:super-admin|admin']);


    // global search
    Route::get('/available-event-resources-global-filter', [EventResourcesController::class, 'globalFilter'])
        ->name('available-event-resources.global-filter');

    // Close an event
    Route::get('event-resources/{eventResource}/close', [EventResourcesController::class, 'closeEventResource'])
        ->middleware(['role:super-admin|admin'])
        ->name('event-resources.close');
    // Open an event
    Route::get('event-resources/{eventResource}/open', [EventResourcesController::class, 'openEventResource'])
        ->middleware(['role:super-admin|admin'])
        ->name('event-resources.open');
});

Route::get('/paystack/verify', [EventController::class, 'verify'])
    ->name('payment.verify');


Route::resource('event-roles', EventRoleController::class);
Route::resource('cancel-events', CancelEventController::class);
Route::resource('user-installment-payments', UserInstallmentPaymentController::class);



// Admin Dashboard
Route::get('/dashboard', function () {
    if (
        request()->user()->role == \App\Enum\UserRoleEnum::ADMIN ||
        in_array(request()->user()?->activeRole(), [
            \App\Enum\UserRoleEnum::SUPERADMIN,
            \App\Enum\UserRoleEnum::ADMIN
        ])
    ) {
        return view('dashboard.dashboard');
    }
    return view('dashboard.my-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// My Dashboard
Route::get('/my-dashboard', function () {
    return view('dashboard.my-dashboard');
})->name('my-dashboard');



// Route::get('fast-excel-centers', [FastExcelController::class, 'exportFormatted'])->name('fast-excel.centers');
// Working with Excel
Route::prefix('fast-excel')->name('fast-excel.')->group(function () {

    // Users
    Route::get('users', [FastExcelController::class, 'users'])->name('users');

    // Centers
    Route::get('centers', [FastExcelController::class, 'centers'])->name('centers');

    // Events
    Route::get('events', [FastExcelController::class, 'events'])->name('events');

    // Booked Events
    Route::get('booked-events', [FastExcelController::class, 'bookedEvents'])->name('booked-events');

    // Booked Event Users
    Route::get('booked-event-users/{event}', [FastExcelController::class, 'bookedEventUsers'])->name('booked_event_users');

    // Transactions
    Route::get('transactions', [FastExcelController::class, 'transactions'])->name('transactions');

    // bookedEventTransactions
    Route::get('booked-event-transactions/{event}', [FastExcelController::class, 'bookedEventTransactions'])->name('bookedEventTransactions');
});



// Google reCaptcha API
Route::apiResource('google-recaptcha', GoogleRecaptchaController::class);

Route::get('/notify', function () {

    $contents = Center::with(['centerAsset'])
        ->get();
    $user = User::find(2);
    $user->notify(new NotifyAdmin($contents));

    return "Notification Sent to " . $user->email;
})->name('admin.notify');


// Route::get('/users/info', function () {
//     return view('dashboard.users.show');
// })->name('users.show');

// Route::get('/users/index', function () {
//     return view('dashboard.pages.datas.index');
// })->name('users.index');

// Route::get('/users/create', function () {
//     return view('dashboard.pages.datas.create');
// })->name('users.create');

// Route::get('/users/about', function () {
//     return view('dashboard.pages.datas.about');
// })->name('users.about');



Route::get('runner', [RunnerController::class, 'run']);


// DEPLOYMENT ROUTES
// Artisan routes for local development and testing
Route::get('/artisan', function (Request $request) {

    // For testing purposes
    $pass = $request->pass;
    $deploy = $request->deploy ?? false;

    // Verifying access
    if (empty($pass) || $pass != 'amtechdigitalnetworks') {
        return ['error' => 'Invalid pass'];
    }

    // For new deployment
    if ($pass && $deploy == 'new') {

        // Run artisan commands here...
        Artisan::call('migrate');
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        // Artisan::call('view:cache');
        // Artisan::call('route:cache');
    }

    // For normal deployment
    Artisan::call('migrate');
    Artisan::call('optimize:clear');
    Artisan::call('storage:link');
    Artisan::call('cache:clear');


    return ['artisan' => 'successfully deployed ' . $deploy];
});





// {{-- Paginate --}}
// <div class="text-center pt-4 bg-white dark:text-gray-100 dark:bg-gray-800">
//     <div class="px-8">
//         @if (isset($events) && !empty($events) && $events->links())
//             {{ $events->links() }}
//         @endif
//     </div>
// </div>


// Test sending mail
Route::get('/test-mail', function () {
    // $user = User::find(2);
    $email = 'abdulsalamamtech@gmail.com';
    // Using the Mail facade to send a test email
    $send = Mail::to($email)->send(new \App\Mail\SendMessageMail($message = 'This is a test email, from: Ducafrica!'));
    // Using the Mailer facade to send a test email
    // $send = Mail::raw('This is a test email, from: SDSSN', function ($message) use ($email) {
    //     $message->to($email)->subject('Test Email: ' . now());
    // });
    return $send ? "done" : "fail";
});


// Fallback Route
Route::get('/fallback', function () {
    return redirect()->back()->with('warnings', 'Features coming soon!');
})->name('fallback');
