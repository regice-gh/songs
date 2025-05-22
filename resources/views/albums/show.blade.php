@extends('layouts.app')

@section('title', $album->name . ' - Album Details')

@section('content')
<div class="container mx-auto my-8 px-4">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $album->name }}</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('album.edit', $album) }}" class="text-yellow-500 hover:text-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('album.destroy', $album) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this album?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700">Band</h2>
                    <div class="mt-2">
                        <a href="{{ route('band.show', $album->band) }}" class="text-blue-500 hover:text-blue-600">
                            {{ $album->band->name }}
                        </a>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700">Release Date</h2>
                    <p class="text-gray-600">{{ $album->release_date->format('F j, Y') }}</p>
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Songs</h2>
                        <a href="{{ route('song.create') }}" class="text-sm text-blue-500 hover:text-blue-600">
                            Add New Song
                        </a>
                    </div>
                    
                    <div class="space-y-4">
                        @forelse($album->songs as $song)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex justify-between items-center">
                                    <div>
                                        <h3 class="font-semibold text-gray-800">{{ $song->title }}</h3>
                                        <p class="text-sm text-gray-600">by {{ $song->artist }}</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('song.show', $song) }}" class="text-blue-500 hover:text-blue-600 text-sm">
                                            View
                                        </a>
                                        <a href="{{ route('song.edit', $song) }}" class="text-yellow-500 hover:text-yellow-600 text-sm">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-4">
                                <p class="text-gray-500">No songs found on this album.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('album.index') }}" class="text-blue-500 hover:text-blue-600">
                    ← Back to Albums
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 