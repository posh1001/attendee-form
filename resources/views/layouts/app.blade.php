<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Excel Bulk Upload') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-blue-600 text-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <h1 class="text-lg font-bold">
                <a href="{{ url('/') }}" class="hover:underline">{{ config('app.name', 'Excel Bulk Upload') }}</a>
            </h1>
            <nav class="space-x-4">
                <a href="{{ route('excel.upload') }}" class="hover:underline">Upload</a>
                <!-- Add more nav links here if needed -->
            </nav>
        </div>
    </header>

    <!-- Main content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 border-t text-sm text-gray-600 mt-8">
        <div class="max-w-7xl mx-auto px-4 py-4 text-center">
            &copy; {{ date('Y') }} {{ config('app.name', 'Excel Bulk Upload') }}. All rights reserved.
        </div>
    </footer>

</body>
</html>
