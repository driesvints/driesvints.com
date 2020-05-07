<?php

declare(strict_types=1);

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        factory(Post::class)->times(30)->create();
    }
}
