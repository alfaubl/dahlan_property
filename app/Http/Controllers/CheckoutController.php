<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->with('product')
            ->get();
            
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }
        
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        return view('checkout.index', compact('cartItems', 'total'));
    }
    
    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        
        DB::beginTransaction();
        
        try {
            $cartItems = Cart::where('user_id', Auth::id())
                ->with('product')
                ->get();
                
            $total = $cartItems->sum(function($item) {
                return $item->product->price * $item->quantity;
            });
            
            // Create order
            $order = Order::create([
                'order_code' => 'INV' . date('Ymd') . str_pad(Order::count() + 1, 3, '0', STR_PAD_LEFT),
                'user_id' => Auth::id(),
                'customer_name' => $request->name,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
                'shipping_address' => $request->address,
                'total_amount' => $total,
                'status' => 'pending',
                'payment_method' => $request->payment_method ?? 'bank_transfer',
                'payment_status' => 'unpaid'
            ]);
            
            // Create order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->product->price * $item->quantity
                ]);
                
                // Reduce stock
                if ($item->product->type == 'furniture') {
                    $item->product->decrement('stock', $item->quantity);
                }
            }
            
            // Clear cart
            Cart::where('user_id', Auth::id())->delete();
            
            DB::commit();
            
            return view('checkout.success', compact('order'));
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}