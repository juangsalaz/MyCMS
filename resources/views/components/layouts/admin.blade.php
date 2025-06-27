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

                @can('access dashboard')
                    <a href="{{ route('admin.dashboard') }}"
                        wire:navigate
                        class="block px-2 py-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        Dashboard
                    </a>
                @endcan

                @can('manage categories')
                    <a href="{{ route('admin.categories') }}"
                        wire:navigate
                        class="block px-2 py-1 rounded {{ request()->routeIs('admin.categories') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        Categories
                    </a>
                @endcan

                @can('manage posts')
                    <a href="{{ route('admin.posts') }}"
                        wire:navigate
                        class="block px-2 py-1 rounded {{ request()->routeIs('admin.posts') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        Posts
                    </a>
                @endcan

                @can('manage pages')
                    <a href="{{ route('admin.pages') }}"
                        wire:navigate
                        class="block px-2 py-1 rounded {{ request()->routeIs('admin.pages') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        Pages
                    </a>
                @endcan

                @can('manage media')
                    <a href="{{ route('admin.media') }}"
                        wire:navigate
                        class="block px-2 py-1 rounded {{ request()->routeIs('admin.media') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        Media Manager
                    </a>
                @endcan
            </nav>
        </aside>

        {{-- Main content --}}
        <main class="flex-1 flex flex-col overflow-y-auto">
            {{-- Topbar --}}
            <header class="bg-white border-b shadow-sm px-6 py-4 flex justify-between items-center">
                <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <span class="text-sm font-medium text-gray-700">
                            {{ auth()->user()->name }}
                        </span>
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-50"
                        x-cloak>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit"
                                    class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="p-6">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewireScripts
</body>
</html>
