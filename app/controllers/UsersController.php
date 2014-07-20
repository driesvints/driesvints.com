<?php

use Models\User;

class UsersController extends BaseController
{
    /**
     * Show the user edit form.
     *
     * @param  \Models\User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return View::make('users.edit', compact('user'));
    }

    /**
     * Updates a user.
     *
     * @param  \Models\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user)
    {
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');

        if (Input::get('password')) {
            $validator = Validator::make(
                Input::only('password', 'password_confirmation'),
                array('password' => 'required|confirmed')
            );

            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $user->password = Input::get('password');
        }

        if (! $user->validate()) {
            return Redirect::back()->withInput()->withErrors($user->getErrors());
        }

        $user->save();

        return Redirect::route('admin.users.edit', $user->id);
    }
}
