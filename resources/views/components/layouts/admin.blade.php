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
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house-icon lucide-house"><path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                        Dashboard
                    </a>
                @endcan

                @can('manage users')
                    <a href="{{ route('admin.users') }}"
                        wire:navigate
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.users') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
                        Users
                    </a>
                @endcan

                @can('manage categories')
                    <a href="{{ route('admin.categories') }}"
                        wire:navigate
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.categories') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag-icon lucide-tag"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"/></svg>
                        Categories
                    </a>
                @endcan

                @can('manage posts')
                    <a href="{{ route('admin.posts') }}"
                        wire:navigate
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.posts') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                        Posts
                    </a>
                @endcan

                @can('manage pages')
                    <a href="{{ route('admin.pages') }}"
                        wire:navigate
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.pages') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-panel-top-icon lucide-layout-panel-top"><rect width="18" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/></svg>
                        Pages
                    </a>
                @endcan

                @can('manage media')
                    <a href="{{ route('admin.media') }}"
                        wire:navigate
                        class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.media') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images-icon lucide-images"><path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/><circle cx="12" cy="8" r="2"/><rect width="16" height="16" x="6" y="2" rx="2"/></svg>
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
