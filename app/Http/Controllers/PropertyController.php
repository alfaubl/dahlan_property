<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the properties.
     */
    public function index(Request $request)
    {
        // Start query
        $query = Property::query();
        
        // Apply filters
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%')
                  ->orWhere('city', 'like', '%' . $request->search . '%')
                  ->orWhere('province', 'like', '%' . $request->search . '%');
            });
        }
        
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', $request->type);
        }
        
        if ($request->has('city') && !empty($request->city)) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }
        
        if ($request->has('bedrooms') && !empty($request->bedrooms)) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        
        if ($request->has('price_range') && !empty($request->price_range)) {
            $priceRange = explode('-', $request->price_range);
            if (count($priceRange) == 2) {
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            }
        }
        
        // Get paginated results
        $properties = $query->latest()->paginate(12);
        
        return view('properties.index', compact('properties'));
    }
    
    /**
     * Show the form for creating a new property.
     */
    public function create()
    {
        return view('properties.create');
    }
    
    /**
     * Store a newly created property in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:house,apartment,land,commercial',
            'price' => 'required|numeric|min:0',
            'city' => 'required|string|max:100',
            'description' => 'nullable|string',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
        ]);
        
        // Add user_id
        $validated['user_id'] = auth()->id();
        $validated['property_code'] = 'PROP-' . time() . '-' . rand(1000, 9999);
        
        // Create property
        Property::create($validated);
        
        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil ditambahkan!');
    }
    
    /**
     * Display the specified property.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
    
    /**
     * Show the form for editing the specified property.
     */
    public function edit(Property $property)
    {
        // Check authorization
        if ($property->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('properties.edit', compact('property'));
    }
    
    /**
     * Update the specified property in storage.
     */
    public function update(Request $request, Property $property)
    {
        // Check authorization
        if ($property->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:house,apartment,land,commercial',
            'price' => 'required|numeric|min:0',
            'city' => 'required|string|max:100',
            'description' => 'nullable|string',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
        ]);
        
        // Update property
        $property->update($validated);
        
        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil diperbarui!');
    }
    
    /**
     * Remove the specified property from storage.
     */
    public function destroy(Property $property)
    {
        // Check authorization
        if ($property->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        // Delete property
        $property->delete();
        
        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil dihapus!');
    }
}