<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = DB::table('images')->get();
        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('images.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'titre'=>'required|max:255',
            'path_image'=>'required|image|mimes:jpg,jpeg,png,webp,jfif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $name, 'public');
            $validated['image'] = $path;
        }
        Image::create($validated);
        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Image $image)
    {
        return view('images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Image $image)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Image $image)
    {
        //
    }
}
