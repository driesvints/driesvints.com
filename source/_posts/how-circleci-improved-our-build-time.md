---
extends: _layouts.post
section: content
title: How CircleCI Improved Our Build Time
date: 2018-04-14
---
I’ve been meaning to look into how I could decrease the build time for the source code of [Laravel.io](https://laravel.io/) for some time now. At [Beatswitch](https://beatswitch.com/), the startup which I work for, we’ve switched to CircleCI 2.0 about a year ago and have been very happy with the results.

CircleCI 2.0’s builds run with Docker which makes spinning up new instances super fast. If you use pre-built images which are customized to your needs, you don’t even need to do any provisioning during the build which saves you quite a bit time. Pulling various images and orchestrating them in a CircleCI 2.0 config allows for very rapid build times. If you add their new workflows to their mix you could easily enable parallelization and speed things up even more.

I’ve been pretty happy with [Travis CI](https://travis-ci.org/) so far for Laravel.io. We had a build time of ~3 minutes which isn’t that long even though our test suite isn’t that extensive. [Here’s an example build.](https://travis-ci.org/laravelio/portal/builds/366453938)

All in all ~3 minutes is a pretty long time to set things up considering the tests themselves run for about 10 seconds. I thought this could be improved and so it did once we tried setting up CircleCI 2.0. Thanks to [this pull request](https://github.com/laravelio/portal/pull/364) by [Ryo Shibayama](https://github.com/serima) we managed to put together [a simple CircleCI 2.0 config](https://github.com/laravelio/portal/blob/2d0ea15eee53ec7767d7b64a77f8f3c26a136c07/.circleci/config.yml). As you can see from [this example build](https://circleci.com/gh/laravelio/portal/14) the built time has significantly improved. Because we have most of our build dependencies up front and we can simply download and spin up the container, we save a lot of time. Installing and building our assets is also greatly improved. Sure, some of it comes from the fact that we now cache our Yarn dependencies but overall we cut down ~2 minutes of build time.

All in all we went from ~3 minutes to ~1 minute which is a lot if you want to keep your feedback loop as short as possible. [We can even reach ~37 seconds](https://circleci.com/gh/laravelio/portal/9) when we use a host which already has the Docker instance cached. That way we only need to spin it up, so the first step only takes ~1 second. Unfortunately, there’s no way to control which host you’re going to use or at least I haven’t found a way to do so yet.

In conclusion, we can really say that CircleCI 2.0 has greatly helped us in improving our build time. I can really recommend looking into their service and giving them a try. If you have an open-source project, they offer four free containers for your project.
