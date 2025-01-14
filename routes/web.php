<?php

use App\Http\Controllers\BookedEventController;
use App\Http\Controllers\CancelEventController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\CenterTypeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventRoleController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Pdfs\GeneratePdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserInstallmentController;
use App\Http\Controllers\UserInstallmentPaymentController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



















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







// Route::resource('users', UserController::class);
// Route::delete('/{user}/delete', 'UsersController@destroy')->name('users.destroy');
// Route::post('/{user}/restore', 'UsersController@restore')->name('users.restore');
// Route::delete('/{user}/force-delete', 'UsersController@forceDelete')->name('users.force-delete');
// Route::post('/restore-all', 'UsersController@restoreAll')->name('users.restore-all');



Route::middleware(['auth', 'verified'])->group(function(){
    
    Route::resource('roles', RoleController::class)
        ->only(['index','store', 'update'])
        ->middleware(['role:super-admin|admin']);
        
    Route::resource('user-roles', UserRoleController::class);

    // Groups
    Route::resource('groups', GroupController::class)
        ->only(['index','store', 'update']);
    Route::get('/my-groups', [GroupController::class, 'myGroups'])
        ->name('my-groups')
        ->middleware(['role:super-admin|admin|group-head']); 

    Route::resource('group-members', GroupMemberController::class)
        ->only(['index','store', 'update']);


    // Centers
    Route::resource('center-types', CenterTypeController::class)
        ->only(['index','store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);

    Route::resource('centers', CenterController::class)
        ->only(['index','store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);

    
    // Events
    Route::resource('event-types', EventTypeController::class)
        ->only(['index','store', 'update', 'show'])
        ->middleware(['role:super-admin|admin']);
    Route::resource('events', EventController::class)
        ->only(['index', 'show']);

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


    Route::resource('users', UserController::class)
        ->only(['index','store', 'update'])
        ->middleware(['role:super-admin|admin']);
    Route::get('new-users/', [UserController::class, 'newUsers'])
        ->name('new-users')
        ->middleware(['role:super-admin|admin']);        

    
    // Search users
    Route::post('/users/search', [UserController::class,'searchUser'])
        ->name('users.search');
    // Search new users
    Route::post('/new-users/search', [UserController::class,'searchNewUser'])
    ->name('new-users.search');
    
});

Route::get('/paystack/verify/', [EventController::class, 'verify'])
    ->name('payment.verify');


Route::resource('event-roles', EventRoleController::class);
Route::resource('cancel-events', CancelEventController::class);
Route::resource('user-installment-payments', UserInstallmentPaymentController::class);









// Admin Dashboard
Route::get('/dashboard', function () {
    if(request()->user()->role == \App\Enum\UserRoleEnum::ADMIN || 
        in_array(request()->user()?->activeRole(), [
            \App\Enum\UserRoleEnum::SUPERADMIN, 
            \App\Enum\UserRoleEnum::ADMIN])
    ) {   
       return view('dashboard.dashboard');
    }
    return view('dashboard.my-dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');


// My Dashboard
Route::get('/my-dashboard', function () {
    return view('dashboard.my-dashboard');
})->name('my-dashboard');






Route::get('/events/info', function () {
    return view('dashboard.pages.events.info');
})->name('events.info');


Route::get('/users/info', function () {
    return view('dashboard.users.show');
})->name('users.show');

// Route::get('/users/index', function () {
//     return view('dashboard.pages.datas.index');
// })->name('users.index');

Route::get('/users/create', function () {
    return view('dashboard.pages.datas.create');
})->name('users.create');

Route::get('/users/about', function () {
    return view('dashboard.pages.datas.about');
})->name('users.about');

Route::get('/fallback', function () {
    return redirect()->back()->with('warnings', 'Features coming soon!');
})->name('fallback');









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