@extends('layouts.app')

@section('title', 'Create New Album')

@section('content')
<div class="bg-white shadow rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Album</h1>

    <form action="{{ route('album.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="band_id" class="block text-sm font-medium text-gray-700">Band</label>
            <select name="band_id" id="band_id" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select a band</option>
                @foreach($bands as $band)
                    <option value="{{ $band->id }}" {{ old('band_id') == $band->id ? 'selected' : '' }}>
                        {{ $band->name }}
                    </option>
                @endforeach
            </select>
            @error('band_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="release_date" class="block text-sm font-medium text-gray-700">Release Date</label>
            <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            @error('release_date')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('album.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg transition duration-200">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                Create Album
            </button>
        </div>
    </form>
</div>
@endsection 