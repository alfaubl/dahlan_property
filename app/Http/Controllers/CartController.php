<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Property; // GANTI: dari Product ke Property
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('property') // GANTI: dari product ke property
            ->get();
            
        $total = $cartItems->sum(function($item) {
            return $item->property->price * $item->quantity; // GANTI: dari product ke property
        });
        
        return view('cart.index', compact('cartItems', 'total'));
    }
    
    public function add(Property $property, Request $request) // GANTI: Parameter dari Product ke Property
    {
        $cart = Cart::where('user_id', Auth::id())
            ->where('property_id', $property->id) // GANTI: dari product_id ke property_id
            ->first();
            
        if ($cart) {
            $cart->increment('quantity');
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'property_id' => $property->id, // GANTI: dari product_id ke property_id
                'quantity' => 1
            ]);
        }
        
        return redirect()->back()->with('success', 'Properti ditambahkan ke keranjang'); // Pesan diperbarui
    }
    
    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->back()->with('success', 'Properti dihapus dari keranjang'); // Pesan diperbarui
    }
}