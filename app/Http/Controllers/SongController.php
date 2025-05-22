<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();     
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request)
    {
        Song::create($request->validate(
            [
                'title' => 'required|string|max:100',
                'artist' => 'required|string|max:100',
            ]
        ));
        return redirect()->route('song.index')->with('success', 'Song created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('songs.song', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->update($request->validate(
            [
                'title' => 'required|string|max:100',
                'artist' => 'required|string|max:100',
            ]
        ));
        return redirect()->route('song.index')->with('success', 'Song updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('song.index')->with('success', 'Song deleted successfully!');
    }
}
