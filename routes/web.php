<?php

use App\Livewire\Admin\Categories\Index as CategoriesIndex;
use App\Livewire\Admin\Categories\Form as CategoryForm;
use App\Livewire\Admin\Posts\Index as PostIndex;
use App\Livewire\Admin\Pages\Index as PageIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\MediaManager;
use App\Livewire\Admin\Users\Index as UsersIndex;
use App\Livewire\Admin\Users\Form as UserForm;


use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.dashboard');
    })->name('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth', 'permission:access dashboard'])->get('/admin/dashboard', Dashboard::class)->name('admin.dashboard');
    //Route::middleware(['auth', 'permission:manage categories'])->get('/admin/categories', Index::class)->name('admin.categories');
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
    //Route::middleware(['auth', 'permission:manage users'])->get('/admin/users', UsersIndex::class)->name('admin.users');

    Route::get('/lang/{locale}', function ($locale) {
        if (!in_array($locale, ['en', 'id'])) {
            abort(400);
        }
        session()->put('locale', $locale);
        return redirect()->back();
    });

    Route::middleware(['auth', 'permission:manage users'])->group(function () {
        Route::get('/admin/users', UsersIndex::class)->name('admin.users');
        Route::get('/admin/users/create', UserForm::class)->name('admin.users.create');
        Route::get('/admin/users/{id}/edit', UserForm::class)->name('admin.users.edit');
    });

    Route::middleware(['auth', 'permission:manage pages'])->group(function () {
        Route::get('/admin/categories', CategoriesIndex::class)->name('admin.categories');
        Route::get('/admin/categories/create', CategoryForm::class)->name('admin.categories.create');
        Route::get('/admin/categories/{id}/edit', CategoryForm::class)->name('admin.categories.edit');
    });


});
