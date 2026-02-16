@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <div class="card border-0 shadow-lg rounded-4 p-5">
                <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                <h2 class="fw-bold mb-3">Pembayaran Berhasil!</h2>
                <p class="text-muted mb-4">Terima kasih, pembayaran Anda telah diterima.</p>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Ke Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection