@extends('layouts.app')

@section('title', 'All Bands')

@section('content')
<div class="bg-white-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Your Band Collection</h1>
        <a href="{{ route('band.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
            Add New Band
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($bands as $band)
            <div class="bg-gray-50 rounded-lg p-4 shadow-sm hover:shadow-md transition duration-200">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $band->name }}</h2>
                <p class="text-gray-600 mb-2">{{ Str::limit($band->description, 100) }}</p>
                <p class="text-sm text-gray-500 mb-4">{{ $band->albums->count() }} Albums</p>
                <div class="flex space-x-2">
                    <a href="{{ route('band.show', $band) }}" class="text-blue-500 hover:text-blue-600">
                        View
                    </a>                    
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
        @empty
            <div class="col-span-full text-center py-8">
                <p class="text-gray-500">No bands found. Add your first band!</p>
            </div>
        @endforelse
    </div>
</div>
@endsection 