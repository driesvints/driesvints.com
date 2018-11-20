---
extends: _layouts.post
section: content
title: "New Website"
publishedAt: "October 27 2013 13:00"
---
Finally managed to finish my new website! I've been working hard on this new website since a few months now. So what's new you might ask? Pretty much everything.<!--more-->

- Migrated from Wordpress to Laravel
- Custom backend (which still needs some tweaking)
- Bootstrap 3
- Moved to Fortrabbit for hosting
- Much more

I use both static Markdown posts as well as posts which are saved in the database for my blog posts and static pages. This allows me to provide a way for people to contribute to blog posts over Github as well as keep drafts of unfinished posts in the database. The static posts and pages can be found in the `posts/` and `pages/` folders. [Dayle Rees](https://twitter.com/daylerees)' [flat file Markdown parser](https://github.com/daylerees/kurenai) proofed to be perfect for the static Markdown posts.

For the blog posts itself I really wanted a clean approach which was focused on making the reading as easy as possible. Blog posts which aren't too wide, easy to use font, clear syntax highlighting for code blocks. And most of all: nothing else that gets in the way. [Medium](https://medium.com/) obviously was a big inspiration for this.

Now that my website is done I should have more time to spend on new blog posts. I hope to get a couple out soon. For starters, check out the blog post with tips I collected on setting up [Laravel 4 on a shared host](http://driesvints.com/blog/laravel-4-on-a-shared-host/).

I've also started to use [Wercker](http://wercker.com/) to handle my site's deployments. Pretty great deployment tool if you ask me.

There's probably still some quirks here and there so don't hesitate to let me know in the comments if you find something.

For more info check out the [Colophon](http://driesvints.com/colophon) page I made. If you'd like to see the source code, you can view it on [Github](https://github.com/driesvints/driesvints.com).

As always, thanks for reading :)
