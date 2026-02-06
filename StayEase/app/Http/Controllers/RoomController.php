<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Room;
use App\Models\hotel;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        
        $query = Room::with('tags', 'properties');
        if ($tagId = $request->get('tag')) {
            $query->whereHas('tags', fn($q) => $q->where('id', $tagId));
        }
        if ($propertyId = $request->get('property')) {
            $query->whereHas('properties', fn($q) => $q->where(
                'id',
                $propertyId
            ));
        }
        $rooms = $query->get();
        $allTags = Tag::all();
        $allProperties = Property::all();
        return view('rooms.index', compact(
            'rooms',
            'allTags',
            'allProperties'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotel = hotel::all();
        $Property = Property::all();
        $Tag = Tag::all();
        return view('rooms.add', [
            'hotel' => $hotel,
            'Property' => $Property,
            'Tag' => $Tag
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|integer',
            'number' => 'required|string',
            'price_per_night' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
        ]);
        $room = Room::create($validated);
        $room->tags()->sync($request->get('tags', []));
        $room->properties()->sync($request->get('properties', []));
        return redirect()->route('rooms.show', $room);
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $room->load('tags', 'properties')->get();
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(room $room)
    {
        dd($room);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index');
    }
}
