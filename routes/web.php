<?php

use App\Events\NewUserRegistered;
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
    event(new NewUserRegistered('test_token','fffffffffff', 'Test Notification', 'This is a test notification body'));

    return 'Notification sent successfully!';
});
