<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;

final class BlogController
{
    public function __invoke()
    {
        $posts = Post::orderByDesc('published_at')->get();

        return view('blog', compact('posts'));
    }
}
