<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::with(['band', 'songs'])->get();
        return view('albums.index', compact('albums'));
    }

    public function create()
    {
        $bands = Band::all();
        return view('albums.create', compact('bands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'release_date' => 'required|date',
            'band_id' => 'required|exists:bands,id'
        ]);

        Album::create($validated);

        return redirect()->route('album.index')
            ->with('success', 'Album created successfully.');
    }

    public function show(Album $album)
    {
        $album->load(['band', 'songs']);
        return view('albums.show', compact('album'));
    }

    public function edit(Album $album)
    {
        $bands = Band::all();
        $songs = Song::whereNull('album_id')->orWhere('album_id', $album->id)->get();
        return view('albums.edit', compact('album', 'bands', 'songs'));
    }

    public function update(Request $request, Album $album)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'release_date' => 'required|date',
            'band_id' => 'required|exists:bands,id',
            'songs' => 'nullable|array',
            'songs.*' => 'exists:songs,id'
        ]);

        $album->update([
            'name' => $validated['name'],
            'release_date' => $validated['release_date'],
            'band_id' => $validated['band_id']
        ]);

        if (isset($validated['songs'])) {
            Song::whereIn('id', $validated['songs'])->update(['album_id' => $album->id]);
            Song::where('album_id', $album->id)
                ->whereNotIn('id', $validated['songs'])
                ->update(['album_id' => null]);
        }

        return redirect()->route('album.index')
            ->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect()->route('album.index')
            ->with('success', 'Album deleted successfully.');
    }
} 