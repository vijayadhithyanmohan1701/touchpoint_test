<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionFormController;
use App\Http\Controllers\SubscribersController;
use App\Models\Subscriber;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/subscribe', [SubscriptionFormController::class, 'createForm'])->name('subscribe');
Route::post('/subscribe', [SubscriptionFormController::class, 'SubscriptionForm'])->name('subscribe.store');

Route::get('/subscribers', [SubscribersController::class, 'index'])->name('subscribers');
Route::post('/subscribers', [SubscribersController::class, 'sendEmail'])->name('subscribers.update');

Route::delete('/subscribers/{subscriber}', function (Subscriber $subscriber) {
    $subscriber->delete();

    return redirect('/subscribers');
});