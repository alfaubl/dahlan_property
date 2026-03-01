<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    // ✅ METHOD INDEX - TAMBAH DATA FAVORITE (TETAP UTUH)
    public function index()
    {
        $properties = Property::latest()->paginate(9);
        
        $totalProperties = Property::count();
        $availableProperties = Property::where('status', 'available')->count();
        $totalCities = Property::distinct('city')->count('city');
        $satisfactionRate = 98; // Example static value
        
        // ✅ TAMBAH INI: Cek favorite status untuk wishlist
        if (Auth::check()) {
            $favoriteIds = Wishlist::where('user_id', Auth::id())
                ->pluck('property_id')
                ->toArray();
        } else {
            $favoriteIds = [];
        }
        
        return view('properties.index', compact(
            'properties',
            'totalProperties',
            'availableProperties',
            'totalCities',
            'satisfactionRate',
            'favoriteIds'  // ✅ TAMBAH
        ));
    }

    // ✅ METHOD SHOW - TAMBAH FAVORITE STATUS (TETAP UTUH)
    public function show(Property $property)
    {
        // ✅ TAMBAH INI: Cek apakah property ini favorit user
        $isFavorite = false;
        if (Auth::check()) {
            $isFavorite = Wishlist::where('user_id', Auth::id())
                ->where('property_id', $property->id)
                ->exists();
        }
        
        // ✅ TAMBAH: Related properties
        $relatedProperties = Property::where('id', '!=', $property->id)
            ->where('status', 'available')
            ->limit(4)
            ->get();
        
        return view('properties.show', compact(
            'property',
            'isFavorite',  // ✅ TAMBAH
            'relatedProperties'  // ✅ TAMBAH
        ));
    }

    // ✅ METHOD CREATE - FORM UPLOAD PROPERTY (BARU DITAMBAH)
    public function create()
    {
        return view('properties.create');
    }

    // ✅ METHOD STORE - SIMPAN PROPERTY (BARU DITAMBAH)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'year_built' => 'nullable|integer|min:1900|max:' . date('Y'),
            'type' => 'required|in:rumah,apartemen,ruko,kantor,villa',
            'purpose' => 'required|in:sale,rent,both',
            'amenities' => 'nullable|array',
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate property code
        $propertyCode = 'PROP-' . strtoupper(Str::random(8));

        // Upload images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('properties', 'public');
            }
        }

        // Create property
        Property::create([
            'property_code' => $propertyCode,
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'type' => $validated['type'],
            'description' => $validated['description'],
            'address' => $validated['address'],
            'city' => $validated['city'],
            'province' => $validated['province'],
            'postal_code' => $validated['postal_code'] ?? null,
            'price' => $validated['price'],
            'area' => $validated['area'],
            'bedrooms' => $validated['bedrooms'],
            'bathrooms' => $validated['bathrooms'],
            'garages' => $validated['garages'] ?? 0,
            'year_built' => $validated['year_built'] ?? null,
            'amenities' => $validated['amenities'] ?? [],
            'images' => $imagePaths,
            'status' => 'pending', // Menunggu approval admin
            'purpose' => $validated['purpose'],
            'user_id' => Auth::id(),
            'featured' => false,
            'views' => 0,
        ]);

        return redirect()->route('properties.my')
            ->with('success', 'Properti berhasil diupload! Menunggu approval admin.');
    }

    // ✅ METHOD EDIT - FORM EDIT PROPERTY (BARU DITAMBAH)
    public function edit(Property $property)
    {
        // Check authorization
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('properties.edit', compact('property'));
    }

    // ✅ METHOD UPDATE - UPDATE PROPERTY (BARU DITAMBAH)
    public function update(Request $request, Property $property)
    {
        // Check authorization
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'price' => 'required|numeric|min:0',
            'area' => 'required|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'garages' => 'nullable|integer|min:0',
            'year_built' => 'nullable|integer|min:1900|max:' . date('Y'),
            'type' => 'required|in:rumah,apartemen,ruko,kantor,villa',
            'purpose' => 'required|in:sale,rent,both',
            'amenities' => 'nullable|array',
            'images' => 'nullable|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload new images if provided
        if ($request->hasFile('images')) {
            // Delete old images
            if ($property->images) {
                foreach ($property->images as $image) {
                    Storage::disk('public')->delete($image);
                }
            }

            // Upload new images
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('properties', 'public');
            }
            $validated['images'] = $imagePaths;
        }

        $property->update($validated);

        return redirect()->route('properties.my')
            ->with('success', 'Properti berhasil diupdate!');
    }

    // ✅ METHOD DESTROY - HAPUS PROPERTY (BARU DITAMBAH)
    public function destroy(Property $property)
    {
        // Check authorization
        if ($property->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        // Delete images
        if ($property->images) {
            foreach ($property->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $property->delete();

        return redirect()->route('properties.my')
            ->with('success', 'Properti berhasil dihapus!');
    }

    // ✅ METHOD MY PROPERTIES - DAFTAR PROPERTY SAYA (BARU DITAMBAH)
    public function myProperties()
    {
        $properties = Property::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        $stats = [
            'total' => Property::where('user_id', Auth::id())->count(),
            'pending' => Property::where('user_id', Auth::id())->where('status', 'pending')->count(),
            'approved' => Property::where('user_id', Auth::id())->whereNotNull('approved_at')->count(),
            'sold' => Property::where('user_id', Auth::id())->where('status', 'sold')->count(),
        ];

        return view('properties.my-properties', compact('properties', 'stats'));
    }
}