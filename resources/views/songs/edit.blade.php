@extends('layouts.app')

@section('title', 'Edit Song')

@section('content')
<div class="bg-white-lg p-6">
    <div class="">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 p-1">Edit Song</h1>

        <form action="{{ route('song.update', $song) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="p-1">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $song->title) }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="p-1">
                <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                <input type="text" name="artist" id="artist" value="{{ old('artist', $song->artist) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                @error('artist')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="p-1">
                <label for="album_id" class="block text-sm font-medium text-gray-700">Album</label>
                <select name="album_id" id="album_id" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Select an album (optional)</option>
                    @foreach($albums as $album)
                        <option value="{{ $album->id }}" {{ old('album_id', $song->album_id) == $album->id ? 'selected' : '' }}>
                            {{ $album->name }} by {{ $album->band->name }}
                        </option>
                    @endforeach
                </select>
                @error('album_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('song.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-200">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Update Song
                </button>
            </div>
        </form>
    </div>
</div>

@endsection