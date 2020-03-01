---
extends: _layouts.post
section: content
title: Building and Deploying Laravel with Github Actions
date: 2020-02-28
---
I recently set up [Github Actions](https://github.com/features/actions) for [Laravel.io](https://laravel.io) so I thought I'd share what it takes to set up a Continuous Delivery pipeline with Github Actions. First, before we continue, I suggest you read [this excellent blog post](https://freek.dev/1546-using-github-actions-to-run-the-tests-of-laravel-projects-and-packages) by my buddy Freek Van der Herten where he already explains Github Actions in great detail. A lot of my setup will already be explained there so we'll focus on the most important and different bits and pieces here.

Let's look at the Github Actions workflow yaml file:

```yaml
name: CI

on:
  push:
  pull_request:

jobs:
  tests:
    runs-on: ubuntu-latest
    name: Tests
    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Cache dependencies
        uses: actions/cache@v1
        with:
          path: ~/.composer/cache/files
          key: dependencies-composer-${{ hashFiles('composer.json') }}

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: 7.3
          extensions: dom, curl, libxml, mbstring, zip, pcntl, pdo, sqlite, pdo_sqlite
          coverage: none

      - name: Install Composer dependencies
        run: composer install --prefer-dist --no-interaction --no-suggest

      - name: Install NPM dependencies
        run: npm install

      - name: Compile assets
        run: npm run production

      - name: Execute tests
        run: vendor/bin/phpunit --verbose

      - name: Deploy
        if: success() && github.ref == 'refs/heads/master'
        run: curl ${{ secrets.ENVOYER_HOOK }}?sha=${{ github.sha }}
``` 

The main difference with a package setup is that we don't do matrix builds. We only test with the specific setup from our production environment. Laravel.io still runs on PHP 7.3 so we only need to run that one.

As you can also see, it's all pretty straight forward. We setup our build environment, install our dependencies, compile our assets (you can skip these two steps if you commit your assets), run tests and deploy the app.

## Deploying the app

```yaml
- name: Deploy
  if: github.ref == 'refs/heads/master'
  run: curl ${{ secrets.ENVOYER_HOOK }}?sha=${{ github.sha }}
```

This step will only run if the build is successful and when the build has run on master. We'll use an `ENVOYER_HOOK` secret env variable to trigger the Envoyer deployment url, pass in the specific commit we want to deploy. 

As soon as the Envoyer url is triggered, it'll start deploying the specific commit. We'll need to define four steps after running the "Install Composer Dependencies" hook.

First we need to re-cache our routes and config:

```bash
cd {{release}}

php artisan route:cache
php artisan config:cache
```

Then we'll install the front-end assets:

```bash
cd {{release}}

npm install
```

And compile them:

```bash
cd {{release}}

npm run production
```

And eventually we'll run the migrations at the end:

```bash
cd {{release}}

php artisan migrate --force
```

After these steps Envoyer will activate the new release.

## Conclusion

That's it! Pretty simple, right? Hope this helps you with your own app.
