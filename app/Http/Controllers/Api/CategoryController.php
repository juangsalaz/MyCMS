<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with(['posts' => function ($q) {
            $q->where('status', 'published');
        }])
        ->when($request->search, function ($query, $search) {
            $query->whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($search) . '%']);
        })
        ->orderBy('name')
        ->paginate($request->per_page ?? 10);

        return CategoryResource::collection($categories)->additional([
            'meta' => [
                'current_page' => $categories->currentPage(),
                'last_page' => $categories->lastPage(),
                'total' => $categories->total(),
            ]
        ]);
    }
}
