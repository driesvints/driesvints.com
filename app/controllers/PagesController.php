<?php

use Models\Page;
use Content\ContentRepositoryInterface;

class PagesController extends BaseController {

	/**
	 * Display a list of pages.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$pages = Page::paginate(10);

		return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		$statuses = Page::getStatuses();

		return View::make('pages.create', compact('statuses'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store()
	{
		$page = new Page;
		$page->title = Input::get('title');
		$page->slug = Input::get('slug') ?: Str::slug($page->title);
		$post->status = Input::get('status');
		$page->published_at = Input::get('published_at');
		$page->body = Input::get('body');
		$page->disable_comments = Input::get('disable_comments');

		if ( ! $page->validate())
		{
			return Redirect::back()
				->withInput()
				->withErrors($page->getErrors());
		}

		$page->save();

		return Redirect::route('admin.pages.edit', $page->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Content\ContentRepositoryInterface  $item
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $item)
	{
        $this->title = $item->title;

		return $this->view('page', compact('item'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Models\Page  $page
	 * @return \Illuminate\View\View
	 */
	public function edit(Page $page)
	{
		$statuses = Page::getStatuses();

		return View::make('pages.edit', compact('page', 'statuses'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Models\Page  $page
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Page $page)
	{
		$page->title = Input::get('title');
		$page->slug = Input::get('slug') ?: Str::slug($page->title);
		$post->status = Input::get('status');
		$page->published_at = Input::get('published_at');
		$page->body = Input::get('body');
		$page->disable_comments = Input::get('disable_comments');

		if ( ! $page->validate())
		{
			return Redirect::back()
				->withInput()
				->withErrors($page->getErrors());
		}

		$page->save();

		return Redirect::route('admin.pages.edit', $page->id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Models\Page  $page
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Page $page)
	{
		$page->delete();

		return Redirect::route('admin.pages.index');
	}

}