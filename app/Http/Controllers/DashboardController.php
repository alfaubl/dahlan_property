<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Data properti
        $totalProperties = Property::where('user_id', $user->id)->count();
        
        // Data booking
        $totalBookings = Booking::where('user_id', $user->id)->count();
        $pendingBookings = Booking::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();
        $successBookings = Booking::where('user_id', $user->id)
            ->where('status', 'success')
            ->count();
            
        // Total spending dari payment yang sukses
        $totalSpending = Payment::where('user_id', $user->id)
            ->where('status', 'success')
            ->sum('amount') ?? 0;
            
        // Recent bookings
        $recentBookings = Booking::with(['property', 'payment'])
            ->where('user_id', $user->id)
            ->latest()
            ->limit(10)
            ->get();
        
        // Data chart contoh (nanti ganti dengan data real)
        $chartSuccess = [12, 19, 15, 17, 14, 23, 8];
        $chartPending = [5, 7, 4, 6, 8, 5, 3];
        
        return view('dashboard.index', compact(
            'user',
            'totalProperties',
            'totalBookings',
            'pendingBookings',
            'successBookings',
            'totalSpending',
            'recentBookings',
            'chartSuccess',
            'chartPending'
        ));
    }
}