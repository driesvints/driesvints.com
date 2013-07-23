<?php namespace Controllers\Admin;

use Str;
use View;
use Input;
use Redirect;
use Models\Page;
use Controllers\BaseController;

class PagesController extends BaseController {

	/**
	 * Display a list of pages.
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$pages = Page::all();

		return View::make('admin.pages.index', compact('pages'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{
		return View::make('admin.pages.create');
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
		$page->published_at = Input::get('published_at');
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
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Models\Page  $page
	 * @return \Illuminate\View\View
	 */
	public function edit(Page $page)
	{
		return View::make('admin.pages.edit', compact('page'));
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
		$page->published_at = Input::get('published_at');
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