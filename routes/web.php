<?php

use App\Models\Home;
use App\Models\Contact;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleAuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;

Route::get('/', function () {
    $homes = Home::orderBy('id', 'DESC')->limit(2)->get();
    return view('compro.index', compact('homes'));
})->name('home.index');

Route::get('contact', function () {
    return view('compro.contact');
})->name('contact.index');

Route::get('login', function () {
    return view('admin.login');
})->name('login.index');

Route::get('dashboard', function () {
    return view('admin.app');
});

// Route::get('homeadmin', [HomeController::class, 'index'])->name('homeadmin.index');
// Route::get('homeadmin/create', [HomeController::class, 'create'])->name('homeadmin.create');
// Route::get('homeadmin/edit/{id}', [HomeController::class, 'edit'])->name('homeadmin.edit');
// Route::put('homeadmin/update/{id}', [HomeController::class, 'update'])->name('homeadmin.update');
// Route::delete('homeadmin/destroy/{id}', [HomeController::class, 'destroy'])->name('homeadmin.destroy');
// Route::post('homeadmin/store', [HomeController::class, 'store'])->name('homeadmin.store');

// Route::resource('aboutadmin', AboutController::class);
// Route::resource('instrukturadmin', InstructorController::class);

Route::post('contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::get('contactadmin/index', [ContactController::class, 'index'])->name('contactadmin.index');
Route::post('contactadmin/reply/{id}', [ContactController::class, 'reply'])->name('contactadmin.reply');

// Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
// Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
// Route::get('logout', [GoogleAuthController::class, 'logout'])->name('logout');

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $user = Socialite::driver('google')->user();

    // cek admin
    if ($user->email === '3901nis@gmail.com') {
        Session::put('admin', $user);
        return redirect('/contactadmin/index');
    }

    return "Akses ditolak (bukan admin)";
});


Route::get('/admin', function () {
    if (!session('admin')) {
        return redirect('/');
    }

    return "Welcome Admin ";
});

Route::get('/logout', function () {
    Session::flush(); // hapus session admin
    return redirect('/'); // balik ke halaman home
});


