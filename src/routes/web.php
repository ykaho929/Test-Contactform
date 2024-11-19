<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'create'])->name('contact.form');

Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');
Route::post('/contacts/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');


Route::get('/thanks',[ContactController::class,'thanks'])->name('contact.thanks');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactController::class, 'admin'])->name('admin');
});

// Route::get('/contacts/search', [ContactController::class, 'search']);
Route::get('/admin', [ContactController::class, 'admin'])->name('admin')->middleware('auth');

Route::get('/register', [ContactController::class, 'register'])->name('register');
Route::post('/register', [ContactController::class, 'register']);
Route::post('/register', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login', [ContactController::class, 'login'])->name('login');
Route::get('/login',[ContactController::class,'login']);
Route::get('/login', function () {
    return view('.login'); 
})->name('login');

Route::post('/logout', [ContactController::class, 'login'])->name('logout');

