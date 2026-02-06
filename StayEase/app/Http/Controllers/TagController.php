<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Tag;
=======
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
<<<<<<< HEAD
    public function show(Tag $tag)
=======
    public function show(string $id)
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
<<<<<<< HEAD
    public function edit(Tag $tag)
=======
    public function edit(string $id)
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, Tag $tag)
=======
    public function update(Request $request, string $id)
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
<<<<<<< HEAD
    public function destroy(Tag $tag)
=======
    public function destroy(string $id)
>>>>>>> 4bf11cc0dce6c5f82c6215d1f01651307b497497
    {
        //
    }
}
