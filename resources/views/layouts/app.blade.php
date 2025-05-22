<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Song Manager')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('song.index') }}" class="text-xl font-bold text-gray-800 p-4">🎵 Song Manager </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <main class="max-w-7xl mx-auto py6 sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="bg-green-100 border px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-50 sm:py-6 shadow-lg mt-8">
        <div class="max-w-7xl mx-auto py-4 px-4 text-center text-gray-600 mt-3">
            © {{ date('Y') }} Song Manager. All rights reserved.
        </div>
    </footer>
</body>
</html> 