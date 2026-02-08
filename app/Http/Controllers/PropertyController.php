<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }
    
    public function create()
    {
        return view('properties.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'property_code' => 'required|unique:properties',
            'name' => 'required',
            'type' => 'required|in:house,apartment,land,commercial',
            'price' => 'required|numeric|min:0',
        ]);
        
        Property::create($request->all());
        
        return redirect()->route('properties.index')
            ->with('success', 'Property created successfully.');
    }
    
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
    
    public function edit(Property $property)
    {
        return view('properties.edit', compact('property'));
    }
    
    public function update(Request $request, Property $property)
    {
        $request->validate([
            'property_code' => 'required|unique:properties,property_code,' . $property->id,
            'name' => 'required',
            'type' => 'required|in:house,apartment,land,commercial',
            'price' => 'required|numeric|min:0',
        ]);
        
        $property->update($request->all());
        
        return redirect()->route('properties.index')
            ->with('success', 'Property updated successfully.');
    }
    
    public function destroy(Property $property)
    {
        $property->delete();
        
        return redirect()->route('properties.index')
            ->with('success', 'Property deleted successfully.');
    }
}