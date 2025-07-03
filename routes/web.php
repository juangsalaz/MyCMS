<?php

use App\Livewire\Admin\Categories\Index;
use App\Livewire\Admin\Categories\Form;
use App\Livewire\Admin\Posts\Index as PostIndex;
use App\Livewire\Admin\Pages\Index as PageIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\MediaManager;
use App\Livewire\Admin\Users\Index as UsersIndex;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'permission:access dashboard'])->get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::middleware(['auth', 'permission:manage categories'])->get('/admin/categories', Index::class)->name('admin.categories');
    Route::middleware(['auth', 'permission:manage posts'])->get('/admin/posts', PostIndex::class)->name('admin.posts');
    Route::middleware(['auth', 'permission:manage pages'])->get('/admin/pages', PageIndex::class)->name('admin.pages');
    Route::post('/admin/trix-upload', function (Request $request) {
        $request->validate([
            'attachment' => 'required|image|max:2048',
        ]);

        $path = $request->file('attachment')->store('trix-images', 'public');

        return response()->json([
            'url' => Storage::url($path),
        ]);
    })->name('admin.trix-upload');

    Route::middleware(['auth', 'permission:manage media'])->get('/admin/media', MediaManager::class)->name('admin.media');
    Route::middleware(['auth', 'permission:manage users'])->get('/admin/users', UsersIndex::class)->name('admin.users');

    Route::get('/lang/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'id'])) {
            abort(400);
        }
        session()->put('locale', $locale);
        return redirect()->back();
    });

});
