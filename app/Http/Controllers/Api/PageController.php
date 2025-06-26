<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Resources\PageResource;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::query()
            ->where('status', 'published')
            ->when($request->search, function ($query, $search) {
                $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
            })
            ->latest()
            ->paginate($request->per_page ?? 10);

        return PageResource::collection($pages)->additional([
            'meta' => [
                'current_page' => $pages->currentPage(),
                'last_page' => $pages->lastPage(),
                'total' => $pages->total(),
            ]
        ]);
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return new PageResource($page);
    }
}
