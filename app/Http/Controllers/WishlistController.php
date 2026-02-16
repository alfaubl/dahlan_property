<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Property;
use App\Models\User;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Tampilkan daftar wishlist user
     */
    public function index()
    {
        $wishlists = Auth::user()->wishlists()
            ->with('property')
            ->latest()
            ->get();
            
        return view('wishlist.index', compact('wishlists'));
    }
    
    /**
     * Tambah properti ke wishlist
     */
    public function store(Property $property)
    {
        // Cek apakah sudah ada
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('property_id', $property->id)
            ->exists();
            
        if ($exists) {
            return redirect()->back()->with('info', 'Properti sudah ada di wishlist');
        }
        
        // ✅ TAMBAHKAN INI: Simpan ke database
        Wishlist::create([
            'user_id' => Auth::id(),
            'property_id' => $property->id
        ]);
        
        return redirect()->back()->with('success', 'Properti ditambahkan ke wishlist');
    }
    
    /**
     * Hapus dari wishlist
     */
    public function destroy(Wishlist $wishlist)
    {
        // Pastikan wishlist milik user yang login
        if ($wishlist->user_id !== Auth::id()) {
            abort(403);
        }
        
        $wishlist->delete();
        
        return redirect()->back()->with('success', 'Properti dihapus dari wishlist');
    }
}