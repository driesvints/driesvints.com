<?php

class AuthController extends BaseController
{
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
        $credentials = Input::only('email', 'password');
        $remember = Input::get('remember') ? : false;

        if (Auth::attempt($credentials, $remember)) {
            return Redirect::route('dashboard');
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

        return Redirect::home();
    }
}
