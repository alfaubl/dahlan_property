@extends('layouts.app')

@section('title', 'Edit Profile - Dahlan Property')

@section('styles')
    @include('partials.css.profile-edit-css')
@endsection

@section('content')
<div class="profile-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Edit Profile Card -->
                <div class="profile-card card">
                    <div class="card-header">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="avatar" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" 
                                       id="avatar" name="avatar" accept="image/*">
                                @error('avatar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                                @if($user->avatar)
                                    <div class="avatar-preview">
                                        <img src="{{ asset('storage/'.$user->avatar) }}" alt="Avatar">
                                    </div>
                                @endif
                            </div>

                            <button type="submit" class="btn-update">
                                <i class="fas fa-save"></i> Update Profile
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Change Password Card -->
                <div class="profile-card card mt-4">
                    <div class="card-header">
                        <i class="fas fa-key"></i> Ubah Password
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.password.update') }}">
                            @csrf
                            @method('PATCH')
                            
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Saat Ini</label>
                                <input type="password" class="form-control @error('current_password') is-invalid @enderror" 
                                       id="current_password" name="current_password" required>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password" class="form-label">Password Baru</label>
                                <input type="password" class="form-control @error('new_password') is-invalid @enderror" 
                                       id="new_password" name="new_password" required>
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" 
                                       id="new_password_confirmation" name="new_password_confirmation" required>
                            </div>

                            <button type="submit" class="btn-password">
                                <i class="fas fa-sync-alt"></i> Ubah Password
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Delete Account Card -->
                <div class="profile-card card mt-4">
                    <div class="card-header">
                        <i class="fas fa-trash-alt"></i> Hapus Akun
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('DELETE')
                            
                            <div class="text-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                Perhatian! Menghapus akun tidak dapat dibatalkan. Semua data Anda akan hilang permanen.
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Masukkan Password untuk Konfirmasi</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                       id="password" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn-delete" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.')">
                                <i class="fas fa-trash-alt"></i> Hapus Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    @include('partials.js.profile-edit-js')
@endsection