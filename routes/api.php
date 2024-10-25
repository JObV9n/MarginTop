<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/* testing API route
Route::get('test', function() {
    return response()->json(['message' => 'Go Go API']);
});
*/
// Event API Routes
Route::get('events/{event?}', [EventController::class, 'getEventJson']);
