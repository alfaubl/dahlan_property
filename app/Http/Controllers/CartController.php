<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display cart items
     */
    public function index()
    {
        $user = Auth::user();
        
        $cartItems = Cart::where('user_id', $user->id)
            ->with(['property'])
            ->latest()
            ->get();
        
        $totalPrice = $cartItems->sum(function($item) {
            return $item->property->price * $item->quantity;
        });
        
        return view('cart.index', compact('cartItems', 'totalPrice'));
    }

    /**
     * Add property to cart
     */
    public function add(Property $property)
    {
        $user = Auth::user();
        
        // Cek apakah sudah ada di cart
        $existingCart = Cart::where('user_id', $user->id)
            ->where('property_id', $property->id)
            ->first();
        
        if ($existingCart) {
            return back()->with('error', 'Properti sudah ada di keranjang');
        }
        
        // Tambah ke cart
        Cart::create([
            'user_id' => $user->id,
            'property_id' => $property->id,
            'quantity' => 1
        ]);
        
        return back()->with('success', 'Properti berhasil ditambahkan ke keranjang');
    }

    /**
     * Remove item from cart
     */
    public function remove(Cart $cart)
    {
        $user = Auth::user();
        
        // Validasi cart milik user
        if ($cart->user_id !== $user->id) {
            abort(403, 'Unauthorized');
        }
        
        $cart->delete();
        
        return back()->with('success', 'Properti dihapus dari keranjang');
    }
}