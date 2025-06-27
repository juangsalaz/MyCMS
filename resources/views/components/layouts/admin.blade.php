<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - {{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 text-xl font-bold border-b">MyCMS</div>
            <nav class="p-4 space-y-2">
                @php
                    $current = request()->routeIs('admin.posts');
                @endphp

                <a href="{{ route('admin.dashboard') }}"
                    wire:navigate
                    class="block px-2 py-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.categories') }}"
                    wire:navigate
                    class="block px-2 py-1 rounded {{ request()->routeIs('admin.categories') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                    Categories
                </a>

                <a href="{{ route('admin.posts') }}"
                    wire:navigate
                    class="block px-2 py-1 rounded {{ request()->routeIs('admin.posts') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                    Posts
                </a>

                <a href="{{ route('admin.pages') }}"
                    wire:navigate
                    class="block px-2 py-1 rounded {{ request()->routeIs('admin.pages') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                    Pages
                </a>

                <a href="{{ route('admin.media') }}"
                    wire:navigate
                    class="block px-2 py-1 rounded {{ request()->routeIs('admin.media') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                    Media Manager
                </a>
            </nav>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>
</html>
