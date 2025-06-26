<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('categories')
            ->where('status', 'published')
            ->when($request->search, function ($query, $search) {
                $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
            })
            ->latest()
            ->paginate($request->per_page ?? 10);

        return PostResource::collection($posts)->additional([
            'meta' => [
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'total' => $posts->total(),
            ]
        ]);
    }

    public function show($slug)
    {
        $post = Post::with('categories')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return new PostResource($post);
    }
}
