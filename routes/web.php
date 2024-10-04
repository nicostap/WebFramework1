<?php

use App\Models\Events;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrganizersController;
use App\Http\Controllers\EventCategoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $events = Events::all();
    return view('home', [
        'events' => $events,
    ]);
});

Route::resource('events', EventsController::class);
Route::resource('organizers', OrganizersController::class);
Route::resource('event_categories', EventCategoriesController::class);
