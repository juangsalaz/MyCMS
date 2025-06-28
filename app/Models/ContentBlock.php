<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    protected $fillable = ['post_id', 'type', 'content', 'position'];

    protected $casts = [
        'content' => 'array',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
