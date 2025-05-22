@extends('layouts.app')

@section('title', 'All Albums')

@section('content')
<div class="bg-white-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Your Album Collection</h1>
        <a href="{{ route('album.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
            Add New Album
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($albums as $album)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $album->name }}</h2>
                <p class="text-gray-600 mb-2">by {{ $album->band->name }}</p>
                <p class="text-sm text-gray-500 mb-2">Released: {{ $album->release_date->format('F j, Y') }}</p>
                <p class="text-sm text-gray-500 mb-4">{{ $album->songs->count() }} Songs</p>
                <div class="flex space-x-2">
                    <a href="{{ route('album.show', $album) }}" class="text-blue-500 hover:text-blue-600">
                        View
                    </a>                    
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
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No albums found. Add your first album!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection 