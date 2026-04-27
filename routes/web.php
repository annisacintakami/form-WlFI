<?php

use App\Models\Home;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    // $homes = Home::orderBy('id', 'DESC')->limit(2)->get();
    return view('compro.index',
    //  compact('homes')
     );
})->name('home.index');

Route::get('/contact', function () {
    return view('compro.contact');
})->name('contact.index');

Route::get('/login', function () {
    return view('admin.login');
})->name('login.index');


/*
|--------------------------------------------------------------------------
| Contact Routes
|--------------------------------------------------------------------------
*/

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| Google Authentication
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.auth');

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();

    // Cek apakah email adalah admin
    if ($user->email === '3901nis@gmail.com') {
        Session::put('admin', $user);

        return redirect('/dashboard');
    }

    return redirect('/')->with('error', 'Akses ditolak, bukan admin.');
});


/*
|--------------------------------------------------------------------------
| Admin Protected Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    if (!session('admin')) {
        return redirect('/login');
    }

    return view('admin.app');
})->name('dashboard');

Route::get('/contactadmin/index', function () {
    if (!session('admin')) {
        return redirect('/login');
    }

    return app(ContactController::class)->index();
})->name('contactadmin.index');

Route::post('/contactadmin/reply/{id}', function ($id) {
    if (!session('admin')) {
        return redirect('/login');
    }

    return app(ContactController::class)->reply(request(), $id);
})->name('contactadmin.reply');


/*
|--------------------------------------------------------------------------
| Logout
|--------------------------------------------------------------------------
*/

Route::get('/logout', function () {
    Session::flush();

    return redirect('/');
})->name('logout');
