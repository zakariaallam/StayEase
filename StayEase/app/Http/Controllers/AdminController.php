<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    public function approveHotel(Hotel $hotel)
    {
        $hotel->update([
            'is_validate' => true
        ]);
        return back();
    }
}