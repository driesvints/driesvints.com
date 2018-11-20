---
extends: _layouts.post
section: content
title: "Laravel 4 learnings: week 1"
publishedAt: "March 17 2013 21:49"
---
So I decided to keep a record of everything I'm learning from Laravel 4 and post it as a blog post at the end of each week. I'm hoping that this will be helpful to others who are also testing Laravel 4. I'll try to post each week and with as much tips as possible.<!--more-->

Let's get started.

## Helper methods

I don't know if people realize this but Laravel 4 has a lot of helper methods that will save you time and provide more readable code. You can find all the helper methods in **Illuminate\Support\helpers.php**

## Named resourceful routes

So [I asked a question on Github](https://github.com/laravel/framework/issues/550) about adding named resourceful routes so you could do someting like `route('<route name>@method')`. I didn't find anything about it in the L4 docs at that time. But Taylor pointed out you actually already can do that.

Every resourceful route has its own name set automatically as the route itself. It's actually not a named route, just a resourceful route. Basically if you want quickly link to a resourceful controller's method you can do the following:

```php
// Generate a route to a resourceful controller through the route() helper function.
route('users.edit', 1);

// Will generate: http://example.com/users/1/edit
```

This is very handy when you have deeply nested namespaced controllers. It saves you the effort from typing the entire namespace to the controller through the action() function.

Nested resources or prefixed routes is also possible. Say you have a users controller which is used under the admin prefix. You can simple do the following:

```php
route('admin.users.edit', 1);
```

Quite the timesaver.

## Generators

This is pretty neat! Jeffrey Way, the editor of Nettuts has developed a package for Laravel 4 that extends the Artisan CLI with custom generators. This tool allows you to generate various parts in Laravel 4 that you're bound to code yourself frequently. It saves you the effort from coding them manually every time. Jeffrey has posted a video about it that will explain it much better than I could possible do :)

[https://tutsplus.com/lesson/custom-generators/](https://tutsplus.com/lesson/custom-generators/)

## Resource naming conventions

This was a question I asked in the IRC channel a bit earlier this week. I don't think this is in the docs but everyone seems to agree that controllers should have plural naming. E.g. `UsersController` instead of `UserController`. This goes for routes, views (`users.show.blade.php`, with users being the folder name), etc. The exception for this are Models which always should be singular. E.g. `User`.

## Model::lists()

Very neat little function an intern at my company ([@jannemoonvx](https://twitter.com/jannemoonvx)) discovered. Ever wanted to get a key/value array for a returned model set? You can do so by using the lists() function. The first parameter defines which column should be used as the value and the second parameter defines which column should be used as the key in the array. Using the ID column is a logic choice as the second parameter. You can later use the array in, for example, a select list generated through the Form helper class in Laravel.

```php
$keyValueArray = User::lists('first_name', 'id');
```

## Conclusion

I hope that these tips were useful to anyone. I'll be sharing more next week. I'm picking up things every week since I started out with Laravel 4 and it's been amazing so far how much it has helped me learn PHP in general but also speed up my development workflow.

Feel free to drop me a note on twitter: [@driesvints](http://twitter.com/driesvints)
