---
extends: _layouts.post
section: content
title: Two tips to speedup your Laravel tests
date: 2016-08-24
---
> This optimization has since [made it into the core](https://github.com/laravel/laravel/blob/6806aaa3568382e9c8c7281a64b82a52b824e46f/phpunit.xml#L27) of the framework. 

I've seen two different tips for speeding up your tests in Laravel in the past week and thought I'd share them with you. For me, they made a significant impact on the speed of my tests.

## Lower the default crypt cost factor

This is a huge time saver. [Jeff Madsen](https://twitter.com/codebyjeff) recently showed us a tip in one of his [Laravel Quick Tips newsletter](http://codebyjeff.com/newsletter) which speeds up your tests by lowering the default crypt cost factor.

> Ordinarily when you need to do a lot of testing with an object that can take a non-trivial amount of time to create, you just mock it. For example - creating a user is not just a matter of writing to databse, but it also has a relatively expensive password hashing process to go through. If your test count is still low this may not seem like a big deal, but when it grows and is run via Jenkins or Travis or similar, it can really slow things down. A mock lets you skip that, and save time.
>
> However, there will be times where you may be forced to go through the actual User create process, such as in integration tests. In that case, this tip can be handy.
>
> In your TestCase.php file, add this line about hashing rounds:
>
> ```
> public function createApplication()
> {
>     $app = require __DIR__.'/../bootstrap/app.php';
>
>     $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
>
>     // add this line
>     Hash::setRounds(5);
>
>     return $app;
> }
> ```
>
> This cuts the number of rounds from the default of 10 down to 5, shaving about half or even more of the time spent hashing. A big saving when you are running dozens of tests all day long!

For me, this cut the time to run the new Laravel.io's test suite almost by half. Sweet!

## Use a precomputed hash in your factories

Another tip is one which was recently added by [Adam Wathan](https://twitter.com/adamwathan) in the Laravel skeleton: https://github.com/laravel/laravel/pull/3894

> Use a precomputed hash of the word "secret" instead of using `bcrypt` directly. Since `bcrypt` is intentionally slow, it can really slow down test suites in large applications that use factories to generate models in many tests.

This additionally cut off some time to run the new Laravel.io test suite. So all in all these two tips made my test suite run twice as fast.
