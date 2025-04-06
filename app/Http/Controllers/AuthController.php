<?php
// App\Http\Controllers\AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $role = Auth::user()->role;

            // Redirect sesuai role
            if ($role == 'mahasiswa') {
                return redirect('/welcome');
            } elseif ($role == 'dosen') {
                return redirect('/dosen/dashboard');
            } else {
                return redirect('/admin/dashboard');
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function register(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:mahasiswa,dosen,admin', // Validasi role
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Menyimpan role yang dipilih
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        // Redirect ke halaman login setelah sukses registrasi
        return redirect()->route('login')->with('status', 'Registration successful! Please login.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    // Menampilkan form reset password
    public function showResetForm()
    {
        return view('auth.password.email');
    }

    // Mengirimkan link reset password ke email
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', 'We have emailed your password reset link!')
            : back()->withErrors(['email' => 'We couldn\'t find a user with that email address.']);
    }

    // Menampilkan form reset password dengan token
    public function showResetFormWithToken($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    // Menangani reset password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'token' => $request->token,
        ];

        $response = Password::reset($credentials, function ($user) use ($request) {
            $user->password = Hash::make($request->password);
            $user->save();
        });

        return $response == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', 'Your password has been reset!')
            : back()->withErrors(['email' => 'The token is invalid or expired.']);
    }
}

