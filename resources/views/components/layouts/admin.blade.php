<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - {{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800 h-full">
    <div class="flex h-screen">
        <x-sidebar />

        {{-- Main content --}}
        <main class="flex-1 flex flex-col overflow-y-auto">
            {{-- Topbar --}}
            <header class="bg-white border-b shadow-sm px-6 py-4 flex justify-between items-center">

                <h1 class="text-lg font-semibold text-gray-800">{{ $title ?? 'Dashboard' }}</h1>

                <div class="flex items-center gap-6">
                    {{-- Language Switcher --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                            <span class="text-sm font-medium text-gray-700 uppercase">{{ app()->getLocale() }}</span>
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="open" @click.outside="open = false"
                            class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg z-50"
                            x-cloak>
                            <a href="{{ url('/lang/en') }}" class="block px-4 py-2 hover:bg-gray-100">🇺🇸 English</a>
                            <a href="{{ url('/lang/id') }}" class="block px-4 py-2 hover:bg-gray-100">🇮🇩 Bahasa</a>
                        </div>
                    </div>

                    {{-- User Dropdown --}}
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
                                    {{ __('menu.logout') }}
                                </button>
                            </form>
                        </div>
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
