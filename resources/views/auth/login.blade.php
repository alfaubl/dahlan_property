@extends('layouts.app')

@section('title', 'Login - Dahlan Property')

@section('styles')
    @include('partials.css.auth-css')
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="auth-container">
        <div class="auth-header">
            <h2>Welcome Back!</h2>
            <p>Silakan login ke akun Anda</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-me">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
            </div>

            <button type="submit" class="btn-auth">Login</button>
        </form>

        <div class="auth-footer">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.auth-js')
@endsection