<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// HOME
Route::get('/', function () {
    return view('compro.index');
})->name('home.index');

// CONTACT PAGE
Route::get('/contact', function () {
    return view('compro.contact');
})->name('contact.index');

// LOGIN PAGE
Route::get('/login', function () {
    return view('admin.login');
})->name('login.index');


/*
|--------------------------------------------------------------------------
| Contact (User)
|--------------------------------------------------------------------------
*/

// SIMPAN PESAN
Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| Google Authentication
|--------------------------------------------------------------------------
*/

// REDIRECT GOOGLE
Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.auth');

// CALLBACK GOOGLE
Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();

    // CEK EMAIL ADMIN
    if ($user->email === '3901nis@gmail.com') {
        Session::put('admin', $user);
        return redirect('/dashboard');
    }

    return redirect('/')->with('error', 'Akses ditolak, bukan admin.');
});


/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/



// DASHBOARD (langsung ke controller)
Route::get('/dashboard', [ContactController::class, 'index'])
    ->name('dashboard');

// HALAMAN CONTACT ADMIN + SEARCH
Route::get('/contactadmin/index', [ContactController::class, 'index'])
    ->name('contactadmin.index');

// REPLY EMAIL
Route::post('/contactadmin/reply/{id}', [ContactController::class, 'reply'])
    ->name('contactadmin.reply');

// DELETE DATA
Route::delete('/contactadmin/{id}', [ContactController::class, 'destroy'])
    ->name('contactadmin.destroy');
    


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', function () {
    session()->forget('admin');
    return redirect('/login');
})->name('logout');