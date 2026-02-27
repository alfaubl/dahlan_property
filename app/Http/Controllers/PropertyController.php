<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->paginate(9);
        
        $totalProperties = Property::count();
        $availableProperties = Property::where('status', 'available')->count();
        $totalCities = Property::distinct('city')->count('city');
        $satisfactionRate = 98; // Example static value
        
        return view('properties.index', compact(
            'properties',
            'totalProperties',
            'availableProperties',
            'totalCities',
            'satisfactionRate'
        ));
    }

    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}