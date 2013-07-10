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
		$pages = Page::all();

		return View::make('pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return View::make('pages.create');
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
		$page->body = Input::get('body');

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
	 * @param  \Content\ContentRepositoryInterface  $page
	 * @return \Illuminate\View\View
	 */
	public function show(ContentRepositoryInterface $page)
	{
		return View::make('pages.show', compact('page'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Models\Page  $page
	 * @return \Illuminate\View\View
	 */
	public function edit(Page $page)
	{
		return View::make('pages.edit', compact('page'));
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
		$page->body = Input::get('body');

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