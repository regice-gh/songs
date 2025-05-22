<?php

namespace App\Http\Controllers;

use App\Models\Band;
use Illuminate\Http\Request;

class BandController extends Controller
{
    public function index()
    {
        $bands = Band::with('albums')->get();
        return view('bands.index', compact('bands'));
    }

    public function create()
    {
        return view('bands.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        Band::create($validated);

        return redirect()->route('band.index')
            ->with('success', 'Band created successfully.');
    }

    public function show(Band $band)
    {
        $band->load('albums.songs');
        return view('bands.show', compact('band'));
    }

    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }

    public function update(Request $request, Band $band)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);

        $band->update($validated);

        return redirect()->route('band.index')
            ->with('success', 'Band updated successfully.');
    }

    public function destroy(Band $band)
    {
        $band->delete();

        return redirect()->route('band.index')
            ->with('success', 'Band deleted successfully.');
    }
} 