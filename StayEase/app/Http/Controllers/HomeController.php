<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::where('is_validate', true)->paginate(3);
        return view('welcome', compact('hotels'));
    }
    public function show(Hotel $hotel)
    {
        if (!$hotel->is_validate) {
            abort(404, "Hôtel non trouvé ou non validé.");
        }

        $hotel->load('images', 'rooms');

        return view('hotels.detail', compact('hotel'));
    }
}
