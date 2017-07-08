---
extends: _layouts.master
section: content
title: "Quality Assurance with Envoyer"
publishedAt: "August 25 2015"
---
This is one of the tutorials I did for my Laracon EU talk.

Most of you probably know about [Envoyer](https://envoyer.io)'s ability to deploy branches. This doesn't makes much sense for your production server but it could help a lot when developing features.

For example, at [BeatSwitch](https://beatswitch.com) we always let a QA engineer manually test out features to make sure everything's ok before we merge and deploy it. Of course, your automated tests should do the bulk of this but a user's eye often sees things that tests don't. That's why a manually check is still important.

How this process could go is that you have a separate QA server which is provisioned by [Forge](https://forge.laravel.com) and setup Envoyer to deploy code to that server. Envoyer's ability to switch branches will help us greatly.

You set up the server and Envoyer like you'd normally do. Perhaps on some other `env` variables than your production instance. After that it's very important that you add one deployment hook before a new release is cloned. You'll need to reset your database because it could be that one feature branch holds different migrations than your other feature branch which is currently live on the server. So running those migrations all the way back will allow you to run all of the new migrations.

You can do that with this hook:

```bash
cd /home/forge/default/current
php artisan migrate:reset --force
```

After that you'll only need to add another hook to run your migrations for the new branch.

```
cd {{release}}
php artisan migrate --force --seed
```

Notice that we seed the database with dummy data. This is handy for the QA to have some data for him to get started.

With this setup you can freely swith branches with envoyer and let your team test out a new feature on the QA server.
