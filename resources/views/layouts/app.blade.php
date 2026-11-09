<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Barangay Bulletin - Purok Pilapil')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 flex flex-col min-h-screen font-sans">
    <header class="bg-blue-900 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-xl font-bold">Barangay Bulletin - Purok Pilapil</h1>
            <nav>
                <a href="{{ route('posts.index') }}" class="hover:underline text-sm font-medium">All Posts</a>
            </nav>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8 flex-grow w-full">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-4 text-sm mt-auto">
        © {{ date('Y') }} Barangay Matina Crossing Bulletin Board. All rights reserved.
    </footer>
</body>
</html>