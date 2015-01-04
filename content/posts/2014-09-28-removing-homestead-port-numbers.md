title: Removing Homestead Port Numbers
slug: removing-homestead-port-numbers
status: published
date: September 28 2014 20:00
tags: laravel
-------
I struggled a bit with removing trailing slashes for Homestead urls when [Chris Fidao](https://twitter.com/fideloper) gave me a tip to omit the port for Homestead domain aliases.<!--more-->

<div class="twitter-quote">
    <blockquote class="twitter-tweet" lang="en"><p><a href="https://twitter.com/DriesVints">@DriesVints</a> Homestead assigns each server an IP on a private network, you should be able to skip port forwarding altogether.</p>&mdash; Chris Fidao™ (@fideloper) <a href="https://twitter.com/fideloper/status/516240175345967104">September 28, 2014</a></blockquote>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</div>

So let's say we have a `dries.loc` alias which we link to in our hosts file:

```
127.0.0.1 dries.loc
```

This is how the docs tell us to do it and enables us to browse to our app using `http://dries.loc:8000`. But there's a way to omit the port number. Instead of using your localhost you should link to your ip address set in your `Homestead.yml` file.

```
192.168.10.10 dries.loc
```

And now you can browse without using the port number: `http://dries.loc`. Neat!

**Extra tip!** Provided by Dan Herd in the comments below. Just surf to `dries.loc.192.168.10.10.xip.io` to avoid editing your hosts file. Of course swap out the `dries.loc` part with your own domain alias.

I sent in a PR to the docs so hopefully this will make things easier for people in the future.