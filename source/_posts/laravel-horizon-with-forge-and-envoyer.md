---
extends: _layouts.post
section: content
title: Laravel Horizon with Forge and Envoyer
date: 2018-02-08
---
I recently installed Horizon for [Laravel.io](https://laravel.io/) and while it wasn’t that hard to install, I still had to figure some things out. Since this was the first time setting everything up I thought I’d write up the steps to take to get started with Horizon and set everything up with Forge and Envoyer.

Before you begin I suggest you read [the introduction post](https://medium.com/@taylorotwell/introducing-laravel-horizon-4585f66e3e) and [this setup guide](https://medium.com/@taylorotwell/deploying-horizon-to-laravel-forge-fc9e01b74d84) both written by Taylor Otwell. They’ll give you an excellent introduction and while the setup guide already gives most of the steps used to set things up, this guide tries to guide you step by step and adds some extra’s for setting everything up with Envoyer.

Remember that this isn’t a guide that dives deep into Horizon, just enough to get it up and running. If you want more info about Horizon’s internals I suggest [this excellent post](https://divinglaravel.com/horizon) by Mohamed Said.

## Step 1: Installation

The first step to get started is very simple. Simple do a `composer require laravel/horizon` on your Laravel project and Horizon will be installed. If you’re using Laravel 5.5 or above, the auto-discovery will hook up your service provider with the framework.

## Step 2: Configuration

The next step is to set up our queue configuration. Run `php artisan vendor:publish --provider="Laravel\Horizon\HorizonServiceProvider"` so the configuration file and the assets get published. The package will publish the assets you’ll need to view the dashboard.

After that go to the `horizon.php` config file and go the the `environments` setting. Here you can define your queues. You can play around a little bit with this later but for now let’s keep the base configuration with just one queue.

## Step 3: Scheduler

If we want to get some cool metrics on our dashboard we’ll need to define a scheduler command. Make sure the scheduler is set up to take snapshots every five minutes. You can add this in the `App\Console\Kernel` class.

```php
/**
 * Define the application's command schedule.
 *
 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
 * @return void
 */
protected function schedule(Schedule $schedule)
{
    $schedule->command('horizon:snapshot')->everyFiveMinutes();
}
```

## Step 4: Authentication

Last step before we commit our code is to set up any authentication rules to make sure no one can access the Horizon dashboard unwanted. You can do this with the `Horizon:auth` callback. I’ve added the following method in the `AppServiceProvider`. It gets called in the `boot` method of the service provider.

```php
public function bootHorizon()
{
    if ($horizonEmail = config('lio.horizon_email')) {
        Horizon::routeMailNotificationsTo($horizonEmail);
    }

    Horizon::auth(function ($request) use ($horizonEmail) {
        return auth()->check() &&
            auth()->user()->emailAddress() === $horizonEmail;
    });
}
```

I’ve configured the email address that will be checked through an environment variable so it’s easy to configure. It gets used to check if the correct user is authenticated to visit the dashboard. But you can really define anything you want here.

Above the auth check I’ve defined a callback which will send any notifications from Envoyer to the email address I’ve set up.

After you’ve done this, commit the code changes and push to Github or whatever VCS host you use.

## Step 5: Envoyer

On Envoyer we need to define a new hook. The `horizon:purge` command will purge any orphan processes. The `horizon:terminate` command will finish any left over jobs and terminate the Horizon process. The daemon which we’ll set up later will make sure that the command is always restarted after we terminate it.

Set up the deployment hook **after** the “Activate New Release” action. This will make sure the command is run after we activate the new app release.

![Add the hook **after** the “Activate New Release” action.](/assets/images/posts/laravel-horizon-with-forge-and-envoyer-1.png)

![](/assets/images/posts/laravel-horizon-with-forge-and-envoyer-2.png)

If you’re managing your environment variables with Envoyer make sure you set your `QUEUE_CONNECTION` env variable to `redis`.

You can now deploy the code we added before. Make sure the deploy finished before proceeding to the next step.

## Step 6: Forge

### Scheduler

First, if you haven’t done so already, make sure the scheduler is set up correctly so the scheduled command is run to populate the metrics. Go to your server and the “Scheduler” menu item. Make sure you add a job which runs every minute and triggers the `schedule:run` command. Setup your command as follows:

```bash
php /home/forge/<site>/current/artisan schedule:run
```

### Daemon

After setting up the scheduler we only need to add the daemon to make sure the Horizon command is started and re-started every time we deploy and terminate it. Go to your server and the “Daemons” menu item. Add a deamon with the `php artisan horizon` command to run in the `/home/forge/<site>/current` directory. After you’ve added this command, the daemon will enable the horizon command and you should be able to visit horizon at `https://site.com/horizon` and see the status below.

![](/assets/images/posts/laravel-horizon-with-forge-and-envoyer-3.png)

Don’t forget that you need to be authenticated with the rules you defined in the `Horizon::auth` hook.

## Conclusion

This should be all that you need to get started with Horizon. Don’t forget that you don’t need to define queues through Forge as Horizon completely takes this over. You only need to change your `horizon.php` config file and Horizon will apply the changes on the next deploy.
