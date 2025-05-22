@extends('layouts.app')

@section('title', $band->name . ' - Band Details')

@section('content')
<div class="container mx-auto my-8 px-4">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-gray-800">{{ $band->name }}</h1>
                <div class="flex space-x-4">
                    <a href="{{ route('band.edit', $band) }}" class="text-yellow-500 hover:text-yellow-600">
                        Edit
                    </a>
                    <form action="{{ route('band.destroy', $band) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600" onclick="return confirm('Are you sure you want to delete this band?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4">
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-700">Description</h2>
                    <p class="text-gray-600">{{ $band->description }}</p>
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-gray-700">Albums</h2>
                        <a href="{{ route('album.create') }}" class="text-sm text-blue-500 hover:text-blue-600">
                            Add New Album
                        </a>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @forelse($band->albums as $album)
                            <div class="bg-gray-50 rounded-lg p-4">
                                <h3 class="font-semibold text-gray-800">{{ $album->name }}</h3>
                                <p class="text-sm text-gray-600">Released: {{ $album->release_date->format('F j, Y') }}</p>
                                <p class="text-sm text-gray-500 mt-2">{{ $album->songs->count() }} Songs</p>
                                <div class="mt-2">
                                    <a href="{{ route('album.show', $album) }}" class="text-blue-500 hover:text-blue-600 text-sm">
                                        View Album
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-4">
                                <p class="text-gray-500">No albums found for this band.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('band.index') }}" class="text-blue-500 hover:text-blue-600">
                    ← Back to Bands
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 