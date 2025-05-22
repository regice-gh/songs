@extends('layouts.app')

@section('title', 'All Songs')

@section('content')
<div class="bg-white-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Your Song Collection</h1>
        <a href="{{ route('song.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
            Add New Song
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($songs as $song)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $song->title }}</h2>
                <p class="text-gray-600 mb-4">by {{ $song->artist }}</p>
                <div class="flex space-x-2">
                    <a href="{{ route('song.show', $song) }}" class="text-blue-500 hover:text-blue-600">
                        View
                    </a>                    
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
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No songs found. Add your first song!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection