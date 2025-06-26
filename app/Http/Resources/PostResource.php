<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'published_at' => $this->published_at,
            'categories' => CategoryResource::collection($this->whenLoaded('categories')),
        ];
    }
}
