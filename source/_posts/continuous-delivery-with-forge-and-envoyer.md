---
extends: _layouts.post
section: content
title: Continuous Delivery with Forge and Envoyer
date: 2015-08-25
---
This is one of the tutorials I did for my Laracon EU talk.

When you run your tests locally on, let's say Homestead, that's fine because you want to run your tests on an environment that closely resembles your production environment. If you use both Homestead and [Forge](forge.laravel.com) to setup your server, you can do just that.

You probably also hooked up Envoyer to automatically deploy your code whenever you push to master. But it's tricky because you could push code which is broken. You won't notice it because you probably forgot to run your tests before you pushed your code. You want to first run your tests and then push your code when those tests pass.

That's why you need a Continuous Integration (CI) service. When you add a CI service between your server and main upstream repository (let's say, Github), then running those tests on that CI service isn't the same as running them on Homestead of a Forge provisioned server. It could differ in PHP version, or some extensions which you need aren't available. The thing also is that there are a lot of great CI services out there: Travis, CircleCI, Codeship, etc. But they're often pretty expensive.

How I solved this is by provisioning one Forge instance (for example, a 512mb [DigitalOcean](https://www.digitalocean.com/) instance) just to run my tests whenever I push code to the master branch. After that server has successfully run my tests I trigger an Envoyer url to deploy my code.

That way you save a lot of money (just $5/month for a 512mb DigitalOcean instance) and you get a great and easy to configurate continuous delivery pipeline.

Setting it up is easy. Add the following code to a `tests.sh` script in the root of your project:

```bash
#!/bin/bash

PHPUNIT_RESULT=`vendor/bin/phpunit`
PHPSPEC_RESULT=`vendor/bin/phpspec run`

if [[ ${PHPUNIT_RESULT} =~ FAILURES ]] || [[ ${PHPSPEC_RESULT} =~ failed ]]
then
    echo "Test have failed!";
    echo ${PHPUNIT_RESULT};
    echo ${PHPSPEC_RESULT};
    # You can notify Slack here if you want for failed builds
else
    # Trigger deployment
    # Replace the url below with your envoyer url
    curl -s 'https://envoyer.io/deploy/this-is-a-dummy-url';
    echo 'Deployment triggered!'
fi
```

And set the following rules as your deployment script on your CI Forge server.

```bash
cd /home/forge/default
git pull origin master
composer install --dev
./tests.sh
```

And that's it! Your Continuous Delivery pipeline is now set up.
