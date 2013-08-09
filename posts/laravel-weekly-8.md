title: Laravel Weekly #8
slug: laravel-weekly-8
status: published
date: May 12 2013 13:41
tags: laravel-weekly, laravel
-------
I changed the name again! Will this be the last time? Probably not! 

I'll be tweeting these posts with #laravelweekly from now on. I also have a couple of ideas in mind for future editions for these posts. Stay tuned :)

Again, if you'd like to see your resources, packages, articles, you name it in these posts, just mention them to me on twitter or email me.<!--more-->

### What Happened To The StackExchange Proposal?

In short: [it got rejected](http://discuss.area51.stackexchange.com/questions/10046/no-really-what-part-of-this-isnt-already-on-topic-for-stack-overflow). The people at [Stack Exchange](http://stackexchange.com/) didn't feel that a separate site for Laravel was needed at this time and pointed out that StackOverflow already provided a platform that we could use.

Now this isn't a bad thing. Like they said, we can use StackOverflow for now which is still a great platform to ask questions. Just tag your posts with #laravel. It won't be a separate Laravel platform but it basically still is the same thing.

Thanks to everyone who voted and helped out, we really appreciate it!

### Laravel Social Groups

There are a number of social groups out there for Laravel. Here's a short list:

- [Facebook](https://www.facebook.com/groups/LaravelCommunity/)
- [Google+](https://plus.google.com/communities/106838454910116161868)
- [LinkedIn](http://www.linkedin.com/groups/Laravel-PHP-Framework-4419933)
- [Reddit](http://www.reddit.com/r/laravel/)

### Laravel 4: Maintenance Mode

https://twitter.com/laravelphp/status/330080201084121088

A recent addition in Laravel 4 beta 5 is the ability to set your application into maintenance mode through Artisan. This gives you a nice way to upgrade or tinker with your app while cutting off user interaction to it.

### Laravel 4: Soft Delete

https://twitter.com/laravelphp/status/330328333332127745

Soft deleting a record means that you're deleting a record without actually removing it from the database. This can be handy in quite some cases where you have relationships defined which you don't want to lose after deleting a record. 

You can learn more about soft deleting records at [the Laravel 4 docs](http://four.laravel.com/docs/eloquent#soft-deleting).

### Laravel 4: Generate Controllers In Subdirs

https://twitter.com/jeffrey_way/status/330347895742160897

When generating controllers through Artisan, you can now generate them inside subdirs by specifing a subdir or namespace before your controller name. When specifing a namespace, the namespace will be added automatically to the file.

### Resources

- [Global site messages in Laravel 4](http://toddish.co.uk/blog/global-site-messages-in-laravel-4/) by [Todd Francis](https://twitter.com/toddish)
- [Custom Artisan Commands And You](https://tutsplus.com/course/custom-artisan-commands-and-you/) by [Tutsplus](https://tutsplus.com) (Partialy Paid) 
- [Laravel 4 Quick Tip: Custom Error Pages](http://driesvints.com/blog/laravel-4-quick-tip-custom-error-pages/) by [Myself](https://twitter.com/driesvints)
- [Laravel 4 + IronMQ Push Queues = Insane Goodness](http://blog.iron.io/2013/05/laravel-4-ironmq-push-queues-insane.html) by [IronMQ](http://www.iron.io/)

### Packages

- [Basset 4.0 (pre-beta)](http://jasonlewis.me/code/basset/4.0) by [Jason Lewis](https://twitter.com/jasonclewis)
- [Handling Proxies in Laravel 4](http://fideloper.com/laravel-4-trusted-proxies) by [Chris Fidao](https://twitter.com/fideloper)
- [Laravel Test Helpers (Beta)](https://github.com/JeffreyWay/Laravel-Test-Helpers) by [Jeffrey Way](https://twitter.com/jeffrey_way)
- [Laravel Breadcrumbs](https://github.com/davejamesmiller/laravel-breadcrumbs) by [Dave James Miller](https://twitter.com/DaveJamesMiller)
- [Async Database Logs for Laravel 4](https://github.com/conradkleinespel/database-log-laravel4) by [Conrad Kleinespel](https://twitter.com/conradktweets)