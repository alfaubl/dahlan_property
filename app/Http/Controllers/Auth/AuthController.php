<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);
        
        // Check validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }
        
        // Attempt to login
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');
        
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            // Redirect based on user role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Login berhasil! Selamat datang ' . $user->name . '.');
        }
        
        // If login fails
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->except('password'));
    }
    
    /**
     * Show registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
    
    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
            'terms' => 'accepted',
        ], [
            'name.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'terms.accepted' => 'Anda harus menyetujui syarat & ketentuan',
        ]);
        
        // Check validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }
        
        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'user',
            'avatar' => null,
            'is_active' => true,
        ]);
        
        // Login user
        Auth::login($user);
        
        // Redirect to dashboard
        return redirect()->route('dashboard')
            ->with('success', 'Registrasi berhasil! Selamat datang di Dahlan Property.');
    }
    
    // ========== FORGOT PASSWORD METHODS ==========
    
    /**
     * Show forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }
    
    /**
     * Send reset link email
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validation
        $request->validate([
            'email' => 'required|email',
        ]);
        
        // Send reset link using Laravel's built-in Password broker
        $status = Password::sendResetLink(
            $request->only('email')
        );
        
        // Return response based on status
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
    
    // ========== RESET PASSWORD METHODS ==========
    
    /**
     * Show reset password form
     */
    public function showResetForm($token)
    {
        // Ambil email dari query string (URL) - INI YANG DIPERBAIKI!
        $email = request()->email;
        
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $email
        ]);
    }
    
    /**
     * Reset password
     */
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                
                $user->save();
                
                event(new PasswordReset($user));
            }
        );
        
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
    
    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/')
            ->with('success', 'Anda telah berhasil logout.');
    }
}