@extends('layouts.app')

@section('title', 'Daftar Akun - Dahlan Property')

@section('styles')
    @include('partials.css.register-css')
@endsection

@section('content')
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="auth-card card">
                    <div class="auth-header">
                        <i class="fas fa-user-plus"></i>
                        <h3>Daftar Akun Baru</h3>
                        <p>Bergabung dengan Dahlan Property</p>
                    </div>
                    
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name') }}" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email') }}" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" 
                                       name="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control" 
                                       required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Nomor Telepon (Opsional)</label>
                                <input type="tel" 
                                       name="phone" 
                                       class="form-control @error('phone') is-invalid @enderror" 
                                       value="{{ old('phone') }}">
                            </div>
                            
                            <div class="mb-4 form-check">
                                <input type="checkbox" 
                                       name="terms" 
                                       class="form-check-input" 
                                       id="terms" 
                                       required>
                                <label class="form-check-label" for="terms">
                                    Saya menyetujui <a href="#" target="_blank">syarat & ketentuan</a>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">
                                Daftar
                            </button>
                            
                            <div class="text-center mt-4">
                                <span class="text-muted">Sudah punya akun?</span>
                                <a href="{{ route('login') }}">Login di sini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.register-js')
@endsection