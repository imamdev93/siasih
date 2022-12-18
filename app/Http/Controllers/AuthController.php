<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use UserTrait;

    public function login()
    {
        if (Auth::guard(session()->get('role'))->check()) {
            return redirect()->route('beranda');
        }
        return view('login');
    }

    public function doLogin(LoginRequest $request)
    {
        try {
            if (!Auth::guard($request->role)->attempt($request->except('role', '_token'))) {
                return redirect()->back()->with('error', 'Username atau password salah');
            }
            session()->put('role', $request->role);
            return redirect()->route('beranda');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

    public function logout()
    {
        Auth::guard(session()->get('role'))->logout();
        session()->forget('role');
        return redirect()->route('login');
    }

    public function show()
    {
        return view('password');
    }

    public function update(PasswordRequest $request)
    {
        $user = $this->getUser();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sama');
        }

        try {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
            auth()->guard(session()->get('role'))->logout();
            return redirect()->route('login')->with('success', 'Password berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Password gagal diubah');
        }
    }
}
