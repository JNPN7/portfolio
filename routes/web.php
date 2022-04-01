<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('home');

Route::prefix('rosebud')->group(function(){
    Auth::routes([
        'register' => false, // Registration Routes...
        'reset' => false, // Password Reset Routes...
        'verify' => false, // Email Verification Routes...
    ]);
});


// Route::get('/rosebud/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
// Route::post('rosebud/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/rosebud/contactlist', [App\Http\Controllers\AdminContactController::class, 'index'])->name('adminHome');

Route::post('/contact/create', [App\Http\Controllers\ContactController::class, 'addContact'])->name('addContact');
Route::delete('/contact/{id}/delete', [App\Http\Controllers\AdminContactController::class, 'deleteContact'])->name('deleteContact');