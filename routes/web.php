<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
    // return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');



// Roles
Route::get('/roles', function () {
    return view('dashboard.pages.roles.index');
})->name('roles');



Route::get('/centers', function () {
    return view('dashboard.pages.centers.index');
})->name('centers');
Route::get('/centers/info', function () {
    return view('dashboard.pages.centers.info');
})->name('centers.info');



Route::get('/events', function () {
    return view('dashboard.pages.events.index');
})->name('events');
Route::get('/events/list', function () {
    return view('dashboard.pages.events.list');
})->name('events.list');


Route::get('/booked-events', function () {
    return view('dashboard.pages.events.booked');
})->name('booked-events');





Route::get('/users', function () {
    return view('dashboard.pages.users.index');
})->name('users');

Route::get('/new-users', function () {
    return view('dashboard.pages.users.new');
})->name('new-users');




// /home/amtech/Desktop/projects/ducafrica-app/resources/views/dashboard/users/show.blade.php
Route::get('/users/info', function () {
    return view('dashboard.users.show');
})->name('users.show');

Route::get('/users/index', function () {
    return view('dashboard.pages.datas.index');
})->name('users.index');

Route::get('/users/create', function () {
    return view('dashboard.pages.datas.create');
})->name('users.create');

Route::get('/users/about', function () {
    return view('dashboard.pages.datas.about');
})->name('users.about');


Route::get('/fallback', function () {
    return view('dashboard.dashboard');
})->name('fallback');
