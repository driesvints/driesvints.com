<?php

use Models\Page;

class PagesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('pages')->truncate();

		Page::create(array(
			'title' => 'Foo',
			'slug' => 'foo',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));

		Page::create(array(
			'title' => 'Bar',
			'slug' => 'bar',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));

		Page::create(array(
			'title' => 'Baz',
			'slug' => 'baz',
			'body' => 'This is some lorum ipsum text.',
			'published_at' => new DateTime,
		));
	}

}