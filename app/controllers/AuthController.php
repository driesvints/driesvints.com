<?php

class AuthController extends BaseController {

	/**
	 * Display the login form.
	 *
	 * @return \Illuminate\View\View
	 */
	public function getLogin()
	{
		return View::make('login');
	}

	/**
	 * Process a login request.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function postLogin()
	{
		$credentials = array(
			'email'    => Input::get('email'),
			'password' => Input::get('password'),
		);

		if (Auth::attempt($credentials))
		{
			return Redirect::route('admin');
		}

		return Redirect::back()->withInput();
	}

	/**
	 * Logout the currently active user.
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function logout()
	{
		Auth::logout();

		return Redirect::route('home');
	}

}