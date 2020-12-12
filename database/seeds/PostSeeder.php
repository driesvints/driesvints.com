<?php

declare(strict_types=1);

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->times(30)->create();
    }
}
