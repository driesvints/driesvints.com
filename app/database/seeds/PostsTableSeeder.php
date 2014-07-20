<?php

use Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        Post::create([
            'title'        => 'Foo',
            'slug'         => 'foo',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);

        Post::create([
            'title'        => 'Bar',
            'slug'         => 'bar',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);

        Post::create([
            'title'        => 'Baz',
            'slug'         => 'baz',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);
    }
}
