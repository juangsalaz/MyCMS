<?php

use App\Livewire\Admin\Categories\Index;
use App\Livewire\Admin\Categories\Form;
use App\Livewire\Admin\Posts\Index as PostIndex;
use App\Livewire\Admin\Pages\Index as PageIndex;
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
    Route::get('/admin/categories', Index::class)->name('admin.categories');
    Route::get('/admin/posts', PostIndex::class)->name('admin.posts');
    Route::get('/admin/pages', PageIndex::class)->name('admin.pages');
    Route::post('/admin/trix-upload', function (Request $request) {
        $request->validate([
            'attachment' => 'required|image|max:2048',
        ]);

        $path = $request->file('attachment')->store('trix-images', 'public');

        return response()->json([
            'url' => Storage::url($path),
        ]);
    })->name('admin.trix-upload');

});
