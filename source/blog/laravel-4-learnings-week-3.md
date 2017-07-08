---
extends: _layouts.master
section: content
title: "Laravel 4 learnings: week 3"
publishedAt: "March 31 2013 14:17"
---
It's been a great week for Laravel 4 with [beta 4](https://github.com/laravel/framework/tree/v4.0.0-BETA4) hot off the press and lots of new functionality added to the framework. I'll go over some of the new functionality as well as the weekly list of tips, tweets and resources that were posted.<!--more-->

https://twitter.com/laravelphp/status/317671374762156032

## Go vote for Laravel at the .net awards!

Laravel has been selected as for the .net awards 2013 under the category "Open Source project of the year". [Go vote for Laravel](http://www.thenetawards.com/)! It doesn't requires you to subscribe to anything or give any personal info.

## Cartalyst will donate 1% of its proceeds to Laravel

A really nice gesture by Cartalyst. [Cartalyst will donate 1% of its income to Laravel](http://blog.cartalyst.com/post/46425201351/building-a-stronger-community). They want to thank Laravel and Taylor in that way for everything Laravel has provided for building their service. This will really help Laravel and Taylor to continue doing his awesome work for the Laravel framework and community.

https://twitter.com/Cartalyst/status/316940582356402176

Of course you can donate as well. All bits help and if Laravel has helped you a lot on your projects go ahead and [give something back](http://laravel.com/about#donations)! :)

## Laravel Q&amp;A stackexchange site

We're trying to get a separate Q&A site for Laravel on the Stack Exchange network. Go see how you can help [here](http://area51.stackexchange.com/proposals/46607/laravel?referrer=AgG4EvnCx9m753uZWv1VMg2#.UVMgw5DgLGQ.twitter).

https://twitter.com/niall_obrien/status/316952716591108096

## Laravel Screencasts

Maksim Surguy built a website which contains a list of Laravel screencasts that came out so far. If you want to learn more about Laravel, you'll have several hours to view some awesome videos on this website. [Go check it out!](http://laracasts.com/)

https://twitter.com/msurguy/status/318130652220375040

## Model Events

Just added in beta 4, Model events provide a nice way to hooking into frequent Model methods, f.e. saving a model to a database or deleting one. It gives you a way to prevent a model, for example, from being deleted when it's still in use by another model or from being created if some of the model properties have invalid or missing values. These are just 2 examples of many use cases for which model events can be used.

You can find the full list of events in [the docs](http://four.laravel.com/docs/eloquent#model-events). I'm actually preparing a separate blog post about them so stay tuned next week for that :)

## Artisan Routes Command

Jeffrey Way's nice "routes" command was added to the Laravel 4 core. A nice way to get an overview of all your app's routes and their actions.

https://twitter.com/laravelphp/status/316574137676070913

## Artisan dump-autoload Command

You probably already knew about `composer dump-autoload`. Laravel has added the same command to Artisan that's optimised for your App and workbenches. Especially useful if you're developing packages.

Run with:

```bash
$ php artisan dump-autoload
```

## Touching Parent Timestamps

A nice addition to Eloquent Models is the ability to touch parent timestamps. Say you have a relation `belongTo()` on a model. If you include a property `$touches` with an array with a value of the parent Model name, the updated_at column will be updated whenever the child Model gets updated. [Check out the docs](http://four.laravel.com/docs/eloquent#touching-parent-timestamps) for detailed info.

## Wildcard Urls

Not a beta 4 feature but something previous Laravel versions already supported. The syntax changed a bit for Laravel 4. If you're building a CMS, for example, this can be a handy feature.

Say you have a post model which has a url property which is a unique index in the database. You want to show the post when that url parameter has been provided. You can set your route up as follows:

```php
Route::get('{param}', function($param)
{
    // Search for url on post model.
    if  ($post = Post::where('url', $param)->first())
    {
        // Build model view.
        return View::make('post', compact('post'));
    }

    // Throw a 404 if model wasn't found.
    App::abort(404).
});
```

Whenever you type anything behind the root url, the route closure will search for a post model by its url. If it's found, the post view will be build. Something you need to make sure of is that you place this wildcard route **at the end of your routes file**. Otherwise it will override any other routes you set after them. First register your "fixed" routes and route groups and place your wildcard route at the end.

Btw, [the compact function](http://be2.php.net/manual/en/function.compact.php) in the code above, if you don't know it, just creates an array with all the variables you provide with their names as array keys.

You can of course search for multiple wildcard parameters.

```php
Route::get('{param}/{param2?}', function($param, $param2 = null)
{
    // Filter on one or both parameters.
});
```

Now you can search for the first parameter and optionally for a second one if it's present. The ? character at the end of the second parameter means it's optional. This is a nice way to deal with nested page models.

## with Helper Method

I know, I'm only documenting a single helper function here but it's such a neat and handy function that I _had_ to show it :)

I think a lot of developers know it's sometimes a bit annoying to first instantiate a new class before you can call a certain function which isn't a static function. You probably have been doing this before:

```php
// Instantiate new object.
$post = new Post;
// Call non-static function on that model.
$postTypes = $post->getPostTypes();
```

The with() helper function makes this a little easier.

```php
$postTypes = with(new Post)->getPostTypes();
```

Basically the with function just returns the object that's being passed along. It's a function to help you chain object methods from the start so you don't need to create a new variable for the object.

## Resources

- [Howto : AJAX multiple file upload in Laravel](http://maxoffsky.com/code-blog/howto-ajax-multiple-file-upload-in-laravel/) by [Maksim Surguy](https://twitter.com/msurguy)
- [Incredible large PHP resources list](https://gist.github.com/ziadoz/1677679) by [Jamie York](https://twitter.com/jamieyork)
- [Sending mail with Postmark](https://tutsplus.com/lesson/sending-mail-with-postmark/) by [Jeffrey Way](https://twitter.com/jeffrey_way)
- [Install Laravel with symlink through terminal shell function/command mamp](http://davidheward.com/2013/03/install-laravel-with-symlink-through-terminal-shell-functioncommand-mamp/) by [David Heward](https://twitter.com/daveheward)
- [I didn’t want to be the ideas person any more](http://insanemission.com/post/46285751294/i-didnt-want-to-be-the-ideas-person-any-more) by [Adam Smith](https://twitter.com/adamontherun)
- [Creating a Custom Laravel 4 Auth Driver](http://toddish.co.uk/blog/creating-a-custom-laravel-4-auth-driver/) by [Todd Francis](https://twitter.com/Toddish)
- [Vagrant development machine provisioned and configured for PHP and Larave](https://github.com/Aboalarm/devbox)l by [Stefan Neubig](https://twitter.com/stefanneubig)
- [ETags and Concurrency Control in Laravel 4](http://fideloper.com/laravel4-etag-concurrency-control) by [Chris Fidao](https://twitter.com/fideloper)
- [An interview with Taylor Otwell](http://webuildatnight.com/features/Laravel) by [We Build At Night](http://webuildatnight.com/)

## Packages

- [API package for Cartalyst](http://forums.laravel.io/viewtopic.php?pid=32702#p32702)
- [Laravel 4 Auth package](http://docs.toddish.co.uk/verify-l4/) by [Todd Francis](https://twitter.com/Toddish)
- [Keeping revisions of your laravel model data](http://www.chrisduell.com/blog/development/keeping-revisions-of-your-laravel-model-data/) by [Chris Duell](https://twitter.com/duellsy)

## Thanks!

Thanks again for reading. If you have something about Laravel 4 out next week, wether it's a blog post, package or something else, let me know and I'll include it in next week's post :)
