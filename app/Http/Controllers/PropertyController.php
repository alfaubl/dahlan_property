<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    // Display listing of properties
    public function index()
    {
        $properties = Property::latest()->paginate(12);
        return view('properties.index', compact('properties'));
    }

    // Show form for creating new property
    public function create()
    {
        return view('properties.create');
    }

    // Store new property
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'type' => 'required|in:house,apartment,land,commercial,villa',
            'description' => 'required|string|min:50',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'area' => 'nullable|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'purpose' => 'required|in:sale,rent,both',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Generate unique property code
        $validated['property_code'] = 'PROP-' . strtoupper(Str::random(8));
        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(6);
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'available';

        // Handle amenities
        $validated['amenities'] = $request->amenities ? json_encode($request->amenities) : null;

        // Handle image uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $imagePaths[] = $path;
            }
            $validated['images'] = json_encode($imagePaths);
        }

        Property::create($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil ditambahkan!');
    }

    // Display single property
    public function show(Property $property)
    {
        // Increment views
        $property->increment('views');
        
        return view('properties.show', compact('property'));
    }

    // Show form for editing property
    public function edit(Property $property)
    {
        // Authorization check - only owner can edit
        if (auth()->id() !== $property->user_id && !auth()->user()->is_admin) {
            abort(403);
        }
        
        return view('properties.edit', compact('property'));
    }

    // Update property
    public function update(Request $request, Property $property)
    {
        // Authorization check
        if (auth()->id() !== $property->user_id && !auth()->user()->is_admin) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'type' => 'required|in:house,apartment,land,commercial,villa',
            'description' => 'required|string|min:50',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'area' => 'nullable|numeric|min:0',
            'bedrooms' => 'nullable|integer|min:0',
            'bathrooms' => 'nullable|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'status' => 'required|in:available,sold,rented,pending',
            'purpose' => 'required|in:sale,rent,both',
            'featured' => 'nullable|boolean',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        // Handle amenities
        $validated['amenities'] = $request->amenities ? json_encode($request->amenities) : $property->amenities;

        // Handle image uploads (append new images)
        if ($request->hasFile('images')) {
            $existingImages = json_decode($property->images, true) ?? [];
            $newImages = [];
            
            foreach ($request->file('images') as $image) {
                $path = $image->store('properties', 'public');
                $newImages[] = $path;
            }
            
            $validated['images'] = json_encode(array_merge($existingImages, $newImages));
        }

        $property->update($validated);

        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil diperbarui!');
    }

    // Delete property
    public function destroy(Property $property)
    {
        // Authorization check
        if (auth()->id() !== $property->user_id && !auth()->user()->is_admin) {
            abort(403);
        }

        // Delete associated images
        if ($property->images) {
            $images = json_decode($property->images, true);
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $property->delete();

        return redirect()->route('properties.index')
            ->with('success', 'Properti berhasil dihapus!');
    }
}