<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();
            if (empty($user)) {
                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');
            } else {
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd('Sesuatu ada yang salah!' . $th->getMessage());
        }
    }

    // public function logout()
    // {
    //     Auth::logout();          // Logout user
    //     session()->invalidate();   // Hapus session
    //     session()->regenerateToken(); // Regenerasi CSRF token

    //     return redirect()->route('login.index'); // Arahkan ke halaman login / landing page
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // atau 'login'
    }
}
