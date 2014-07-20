<?php

use Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->truncate();

        Page::create([
            'title'        => 'Foo',
            'slug'         => 'foo',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);

        Page::create([
            'title'        => 'Bar',
            'slug'         => 'bar',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);

        Page::create([
            'title'        => 'Baz',
            'slug'         => 'baz',
            'status'       => 'published',
            'body'         => 'This is some lorum ipsum text.',
            'published_at' => new DateTime,
        ]);
    }
}
