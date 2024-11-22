<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Film;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::whereNull('return_date')->with('film')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'renter_name' => 'required|string|max:255',
            'film_id' => 'required|exists:films,id',
            'rental_date' => 'required|date',
        ]);

        Rental::create($request->all());

        return redirect()->route('rentals.index')->with('success', 'Kölcsönzés rögzítve!');
    }
}
