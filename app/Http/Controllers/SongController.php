<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with('album')->get();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::all();
        return view('songs.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'artist' => 'required|string|max:100',
            'album_id' => 'nullable|exists:albums,id'
        ]);

        Song::create($validated);

        return redirect()->route('song.index')
            ->with('success', 'Song created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        $song->load('album.band');
        return view('songs.song', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $albums = Album::all();
        return view('songs.edit', compact('song', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Song $song)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'artist' => 'required|string|max:100',
            'album_id' => 'nullable|exists:albums,id'
        ]);

        $song->update($validated);

        return redirect()->route('song.index')
            ->with('success', 'Song updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('song.index')
            ->with('success', 'Song deleted successfully.');
    }
}
