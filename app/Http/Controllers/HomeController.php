<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Post;

final class HomeController
{
    public function __invoke()
    {
        $posts = Post::orderByDesc('published_at')->limit(5)->get();

        return view('home', compact('posts'));
    }
}
