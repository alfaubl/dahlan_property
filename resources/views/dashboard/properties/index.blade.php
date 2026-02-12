@extends('layouts.app')

@section('title', 'Keranjang Belanja - Dahlan Property')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">🛒 Keranjang Belanja Anda</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($cartItems->isEmpty())
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
                        <h5 class="text-muted">Keranjang Anda kosong</h5>
                        <a href="{{ route('properties.index') }}" class="btn btn-primary mt-3">
                            Jelajahi Properti
                        </a>
                    </div>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Properti</th>
                                <th>Harga</th>
                                <th>Kuantitas</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->property->title }}</strong><br>
                                    <small>{{ $item->property->address }}</small>
                                </td>
                                <td>Rp {{ number_format($item->property->price, 0, ',', '.') }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rp {{ number_format($item->property->price * $item->quantity, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('properties.index') }}" class="btn btn-secondary">
                        Lanjut Belanja
                    </a>
                    <a href="#" class="btn btn-primary">
                        Checkout
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection