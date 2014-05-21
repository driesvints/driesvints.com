title: Laravel 4 learnings: week 2
slug: laravel-4-learnings-week-2
status: published
date: March 24 2013 13:57
tags: laravel-weekly, laravel
-------
It's been another great week for Laravel 4. Lots of new additions and I've got a neat list of tips, tricks and resources for you.<!--more-->

## Laravel 4 beta 4 will be released this thursday

The 4th Laravel 4 beta will be released this thursday with updated documentation. You'll be blown away by all the cool newly added functionality! :)

https://twitter.com/laravelphp/status/315541203628220416

## Laracon screencasts

For those of you who didn't see them yet, here are [all the Laracon screencasts](http://www.youtube.com/user/LaravelScreencasts). A big thanks to [Chris Borgia](https://twitter.com/cborgia)!

## Where to place your helper functions, view composers, etc

I asked the question earlier this week on the [Laravel IRC](http://laravel.com/irc) channel and the majority of the people there seemed to agree that it should be in `app/start/global.php`. It makes sense. I was putting them in `app/filters.php` before but as the filename indicates that's more a location where you'd want to define your route filters, etc. If you open the `global.php` file you'll see that it will call the `filters.php` file at the end. It makes more sense putting your custom functions, validators etc here because it's a starting point for your application. Basically you're saying: "These are all the extra functionality that my app needs before I go ahead."

You could also make a separate `custom.php` file in app/start and include it in the `global.php` file just before the `filters.php` file inclusion. This is a nice way to separate your code from the default code in `global.php`.

~~~ .php
require __DIR__.'/custom.php';
require __DIR__.'/../filters.php';
~~~

That way you have a nice separate file for all your custom functions.

Note that there really isn't a convention for a location for these custom functionalities. From the Laravel 4 docs about View composers (as an example):
> Note that there is no convention on where composer classes may be stored. You are free to store them anywhere as long as they can be autoloaded using the directives in your composer.json file.
So you're free to place them anywhere as you like as long as they're being autoloaded.

## Namespacing your models

I've found it to be very helpful to namespace my models from the start. Because sooner or later, you might run into a problem when you're trying to define a model that has the same name as an application alias. Take the `File` model for example. Laravel offers an alias by default to a facade of its Filesystem functionality to manipulate files. You can't use the name `File` as a model classname because it will interfere with the application alias. That's where namespaces come in.

~~~ .php
<?php namespace Models;

class File extends \Eloquent {

    protected $table = 'files';

}
~~~

Now that we have namespaced the model we don't have to worry about it interfering with the application alias anymore. Note that we specifically need to set the `$table` property on the model because otherwise Laravel will assume the database table is called `models_file`.

You can now use this model in controllers, routes etc by specifying the full namespace:

~~~ .php
Models\File::find(1);
~~~

Or you can import the model and still use the File alias by referencing the global namespace:

~~~ .php
<?php

use Models\File;

class UserController extends BaseController {

    public function index()
    {
        // Use the File model.
        $file = File::find(1);

        // Use the File alias to get the file contents.
        return \File::get($file->filepath);
    }

}
~~~

If you namespace your models from the beginning it's going to save you troubles later on when you can't pick a name when it's already set somewhere else.

## Model query scopes

As since a few days, Model query scopes have landed in the L4 beta!

https://twitter.com/laravelphp/status/314568892376829952

## Database aggregate functions

This is just plucked from the L4 docs but it's so extremely helpful. Get the value of a mathematic function immediately from the database.

Source: [http://four.laravel.com/docs/queries#aggregates](http://four.laravel.com/docs/queries#aggregates)

## Don't worry about flash data in forms!

Jeffery Way pointed this out on twitter. You actually don't have to set flash data on forms as Laravel handles this automatically. So. Damn. Handy! :)

https://twitter.com/jeffrey_way/status/315128216148922368

https://twitter.com/jeffrey_way/status/315128395346362370

## Laravel Testing Decoded

There's [a cool eBook](https://leanpub.com/laravel-testing-decoded) coming out soon about testing in Laravel. And who other than Jeffrey Way could be writing it?

## Resources

Here's a list of resources which came out this week.

- [Error After A Composer Update Of The Laravel 4 Beta](http://jasonlewis.me/article/error-afer-a-composer-update-of-the-laravel-4-beta) by [Jason Lewis](https://twitter.com/jasonclewis)
- [Snappy](http://besnappy.com/): Helpdesk service by [Userscape](http://www.userscape.com/) which is actually build by Taylor amongst others. You can bet Laravel is powering it ;)
- A bunch of new videos are up at Nettuts: [https://tutsplus.com/course/whats-new-in-laravel-4/](https://tutsplus.com/course/whats-new-in-laravel-4/)
- [PHPunit wrappers for Laravel 4](https://github.com/JeffreyWay/PHPUnit-Wrappers) by [Jeffrey Way](http://twitter.com/jeffreyway)
- <span style="line-height: 13px;">[Eloquent relationship tip](https://twitter.com/philsturgeon/status/315147146133397505) by [Phil Sturgeon](http://twitter.com/philsturgeon)</span>
- [Pro workflow in Sublime Text 2 and Laravel](http://net.tutsplus.com/tutorials/tools-and-tips/pro-workflow-in-laravel-and-sublime-text/) by Nettuts
- [Laravel wallpapers!](https://github.com/msurguy/Laravel-wallpapers) by [Maksim Surguy](https://twitter.com/msurguy)
- [Installing and updating Laravel 4](http://niallobrien.me/2013/03/installing-and-updating-laravel-4/) by [Niall O'Brien](https://twitter.com/niall_obrien)
- [Authentication &amp; Authorisation](http://niallobrien.me/2013/03/authentication-authorisation/) by [Niall O'Brien](https://twitter.com/niall_obrien)