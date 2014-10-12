title: Laravel 4 learnings: week 5
slug: laravel-4-learnings-week-5
status: published
date: April 14 2013 17:28
tags: laravel-weekly, laravel
-------
Wooha, has it already been 5 weeks since I started these blog posts? Time flies. I want to thank all of you for the wonderful responses I’ve been getting about these posts. Again, if you’d like to see your blog posts, packages or anything else for Laravel 4 in these posts, mail or mention me the links and I’ll have them up next week!<!--more-->

## New Laravel 4 Screencast

In this [brand new L4 screencast](http://vimeo.com/63892510), Taylor talks about the newest additions to the framework.

http://vimeo.com/63892510

## Laracon EU: A Call For Talk Proposals

[Laracon EU is starting to take shape](http://laravel.io/topic/23/laracon-eu-a-call-for-talk-proposals). The recent survey by [Shawn McCool](https://twitter.com/ShawnMcCool) turned out to have a great response and he’s confident that there will be enough attendees to have a decent conference, probably late Summer 2013.

Before Laracon EU can happen, speakers will be needed for the conference. You can [submit a talk proposal here](https://heybigname.typeform.com/to/bY3H46) if you’re interested at speaking at Laracon EU.

## Laravel 4 Primer: JSON

https://twitter.com/daylerees/status/323043035237740546

[Dayle Rees](https://twitter.com/daylerees) has teased a chapter from his upcoming book “Code Bright”. [Go have a look](http://daylerees.com/laravel-four-primer-json)!

## HTTP Basic Auth

https://twitter.com/laravelphp/status/321290995155206145

Implementing HTTP basic authentication has never been easier now that it’s baked into the core of Laravel 4. When you put the filter on a route, your browser will prompt you with a login screen. The user logs in and Laravel handles the authentication automatically.

~~~ .php
Route::get('basicauth', array('before' => 'auth.basic', function()
{
    return 'Logged in!';
}));
~~~

## Improved Error Display With The “Whoops” Library

https://twitter.com/laravelphp/status/322416887680098304

Replacing the old Symfony error screens, the Whoops library provides a much improved error handling screen.

## Support For Renaming Database Table Columns

Support for renaming database table columns in L4 has been added. First parameter is the original column name and the second one is the new column name.

~~~ .php
Schema::table('addresses', function($table)
{
    $table->renameColumn('location', 'city');
});
~~~

## Resources

- [Blade Syntax Highlighter for Sublime Text](https://github.com/Medalink/laravel-blade)</a> by <a href="https://twitter.com/medalink7">Eric Percifiel
- [How To Contribute To Laravel 4](http://driesvints.com/blog/how-to-contribute-to-laravel-4/) by myself
- [Using Dependency Injection and IoC in Laravel 4 controllers](http://www.nathandavison.com/posts/view/16/using-dependency-injection-and-ioc-in-laravel-4-controllers) by [Nathan Davison](http://www.nathandavison.com/)
- [A Bit Of Everything](http://niallobrien.me/2013/04/a-bit-of-everything/) by [Niall O’Brien](https://twitter.com/niall_obrien)
- [Quick tip on swapping Facades with Mocks when testing](https://gist.github.com/JeffreyWay/5348385) by [Jeffrey Way](https://twitter.com/jeffrey_way)

## Screencasts

- [Validation Services](https://tutsplus.com/lesson/validation-services/) by [Tutsplus](https://tutsplus.com)
- [Validating With Models and Event Listeners](https://tutsplus.com/lesson/validating-with-models-and-event-listeners/) by [Tutsplus](https://tutsplus.com)

## Meetups

- [Laravel Meetup Germany](http://meetup.laravel.de/) by [Franz Liedke](https://twitter.com/franzliedke)
- [Danish Laravel Meetup](http://forums.laravel.io/viewtopic.php?id=7497) by [Peter Suhm](https://twitter.com/petersuhm)

## Packages

- v1.0 of [Revisionable](https://github.com/VentureCraft/revisionable) by [Chris Duell](https://twitter.com/duellsy) is now released