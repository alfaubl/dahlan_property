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
        $availableProperties = Property::where('user_id', $user->id)
            ->where('status', 'available')
            ->count();
        $rentedProperties = Property::where('user_id', $user->id)
            ->where('status', 'rented')
            ->count();
        
        // Data spending
        $totalSpending = Payment::where('user_id', $user->id)
            ->where('status', 'success')
            ->sum('amount') ?? 0;
        
        // Data untuk chart distribusi
        $distributionData = [
            Property::where('user_id', $user->id)->where('type', 'rumah')->count(),
            Property::where('user_id', $user->id)->where('type', 'apartemen')->count(),
            Property::where('user_id', $user->id)->where('type', 'ruko')->count(),
            Property::where('user_id', $user->id)->where('type', 'kantor')->count(),
            Property::where('user_id', $user->id)->where('type', 'villa')->count(),
        ];
        
        return view('dashboard.index', compact(
            'user',
            'totalProperties',
            'availableProperties',
            'rentedProperties',
            'totalSpending',
            'distributionData'
        ));
    }
}