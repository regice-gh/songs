<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Songs</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Songs</h1>
            <p class="text-gray-600 mb-6">Here you will see all your songs and even create, edit, and delete your songs</p>
            
            <div class="space-y-4">
                <a href="{{ route('song.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    View All Songs
                </a>
                <a href="{{ route('song.create') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition duration-200">
                    Create Your Own Song
                </a>
            </div>
        </div>
    </div>
</body>
</html>