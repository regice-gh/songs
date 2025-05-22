@extends('layouts.app')

@section('title', $song->title . ' - Song Title')

@section('content')
<div class="container mx-auto my-8 px-4 pz-4">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $song->title }}</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('song.edit', $song) }}" class="text-yellow-500 hover:text-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('song.destroy', $song) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this song?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <div class="mb-3">
                    <h2 class="text-lg font-semibold text-gray-700">Artist</h2>
                    <p class="text-gray-600">{{ $song->artist }}</p>
                </div>
                <div class="mb-3">
                    <h2 class="text-lg font-semibold text-gray-700">Added</h2>
                    <p class="text-gray-600">{{ $song->created_at->format('F j, Y') }}</p>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">Last Updated</h2>
                    <p class="text-gray-600">{{ $song->updated_at->format('F j, Y') }}</p>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('song.index') }}" class="text-blue-500 hover:text-blue-600">
                    ← Back to Songs
                </a>
            </div>
        </div>
    </div>
</div>
@endsection