<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->get();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'genre_id' => 'required|exists:genres,id',
            'release_year' => 'required|digits:4',
        ]);

        Film::create($request->all());

        return redirect()->route('films.index')->with('success', 'Film sikeresen hozzáadva!');
    }
    public function destroy()
    {

    }
}
