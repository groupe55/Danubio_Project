<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function create(Request $request){
        $validated = $request->validate([
            'type' => 'required|in:house,apartment',
            'address' => 'required|string|max:255',
            'size' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'price' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $property = Property::create($validated);

        return response()->json($property, 201);
    }
public function search(Request $request){
    $query = Property::query();

    if ($request->has('type')) {
        $query->where('type', $request->type);
    }
    if ($request->has('address')) {
        $query->where('address', 'like', '%' . $request->address . '%');
    }
    if ($request->has('size')) {
        $query->where('size', $request->size);
    }
    if ($request->has('bedrooms')) {
        $query->where('bedrooms', $request->bedrooms);
    }
    if ($request->has('price')) {
        $query->where('price', '<=', $request->price);
}
return response()->json($query->get());

}
public function searchByRadius(Request $request)
{
    $latitude = $request->latitude;
    $longitude = $request->longitude;
    $radius = $request->radius; 

    $properties = Property::within($radius, 'km', $latitude, $longitude)->get();

    return response()->json($properties);
}


    }

