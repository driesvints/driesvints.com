<?php

use Models\Post;

class PostsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('posts')->truncate();

		Post::create(array(
			'title' => 'Foo',
			'slug' => 'foo',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));

		Post::create(array(
			'title' => 'Bar',
			'slug' => 'bar',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));

		Post::create(array(
			'title' => 'Baz',
			'slug' => 'baz',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));
	}

}