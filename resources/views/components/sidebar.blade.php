{{-- Sidebar --}}
<aside class="w-64 bg-white shadow-md flex flex-col h-screen overflow-y-auto">
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
                {{ __('menu.dashboard') }}
            </a>
        @endcan

        @can('manage users')
            <a href="{{ route('admin.users') }}"
                wire:navigate
                class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.users') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
                {{ __('menu.users') }}
            </a>
        @endcan

        @can('manage categories')
            <a href="{{ route('admin.categories') }}"
                wire:navigate
                class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.categories') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-tag-icon lucide-tag"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"/></svg>
                    {{ __('menu.categories') }}
            </a>
        @endcan

        @can('manage posts')
            <a href="{{ route('admin.posts') }}"
                wire:navigate
                class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.posts') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>
                {{ __('menu.posts') }}
            </a>
        @endcan

        @can('manage pages')
            <a href="{{ route('admin.pages') }}"
                wire:navigate
                class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.pages') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-panel-top-icon lucide-layout-panel-top"><rect width="18" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/></svg>
                {{ __('menu.pages') }}
            </a>
        @endcan

        @can('manage media')
            <a href="{{ route('admin.media') }}"
                wire:navigate
                class="flex items-center gap-2 px-2 py-1 rounded {{ request()->routeIs('admin.media') ? 'bg-blue-100 text-blue-700 font-semibold' : 'hover:bg-gray-200' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-images-icon lucide-images"><path d="M18 22H4a2 2 0 0 1-2-2V6"/><path d="m22 13-1.296-1.296a2.41 2.41 0 0 0-3.408 0L11 18"/><circle cx="12" cy="8" r="2"/><rect width="16" height="16" x="6" y="2" rx="2"/></svg>
                {{ __('menu.media') }}
            </a>
        @endcan
    </nav>
</aside>