---
extends: _layouts.post
section: content
title: The New Laravel.io
date: 2017-07-03
---
<p class="image">
    <img src="/assets/images/posts/the-new-laravel-io.png" alt="The redesigned homepage">
    <span>The redesigned homepage</span>
</p>

It’s been almost three years since I wrote [this blog post](https://driesvints.com/blog/laravel-io-the-road-ahead/). And truth be told, it has been one heck of a ride. The last three years have been a mixture of sporadic working on the platform and thinking of cool new features while battling spam and the urge to throw in the towel. And I came very close to doing just that.

I started off by improving [the original source code](https://github.com/laravelio/portal/tree/51705ac06e86b8b2eaf566e1d6bf01636bcd00f3). While the source definitely wasn’t bad, it proved to be quite the undertaking to improve code which wasn’t my own. If this was to be a contracted job I probably would have made the best out of it and improved it gradually and as best as I could. But this was a project I had full control over and I had time. If I were to maintain this myself it would be best if I knew the source code by heart. So after a few months, I decided to throw out all of the existing code and rewrite from scratch.

At the same time in my first year at Laravel.io I had another challenge I was facing: spam. Lots and lots of spam. It seemed like every other day another flood of spam accounts and bots overwhelmed the forum and pastebin, causing all kinds of problems. A flood of advertisement, downtime for both the platform and pastebin (which was one app back then) and endless evenings of cleaning the forum, database tables and banning accounts. I started implementing anti spam measures and believe me when I say that I’ve literally tried every trick in the book. From [Honeypot](https://en.wikipedia.org/wiki/Honeypot_%28computing%29) to [Recaptcha](https://www.google.com/recaptcha/intro/) and [Akismet](https://akismet.com/), you name it. Nothing worked, the spam continued. Some measures proved to hold the spam back a bit but it kept coming. I really should write a blog post one day about it or write a package for easier anti-spam measures but to be honest, even after all this time, I rather just forget about it. I’m still removing spam on Laravel.io on almost a daily basis.

This lasted for over a year, I think, and brought me to my darkest hour. I was ready to throw in the towel. Open Source is great and all and you can get a lot of great things out of it but believe me when I say that it can also bring you a terrific amount of mental and physical stress at times. These were my toughest moments.

But I persisted and continued working on the new platform sporadically. At first I wanted the new portal to be much more than what it was at the time. Thinking of all sorts of features I could build and release at once. But alas, time proved to be my enemy. Month after month crept along and more and more I started to realise that this would take quite an amount of time before I could realise what I was planning. After a while I couldn’t help but admit that I had to settle for a revamp of the current functionality and that it would be much less than I was planning on. I decided to focus on [the pastebin](https://paste.laravel.io/) first and move it to a separate app. After that I continued to work on the new portal.

If anything can be said about the new portal, it’s that at least I took enough time to thoroughly think about the internals. I wanted to build not just something I felt comfortable with working with myself but also something the community could learn from. From day one till now and beyond this it is and will still be my number one priority for Laravel.io: to offer open source software to the Laravel and greater PHP community to learn from and work on together. And as long as I’m around, the portal’s source code will stay open source and available for everyone under the MIT license.

As for the rest, let me say that I’m not a designer. I’m not happy with the result of the way the new portal looks. It’s basic Bootstrap 3 with a theme over it and while it looks ok, it by no means comes to the standards I want to set for myself and Laravel.io in general. But a great design requires funds and that’s something that Laravel.io is lacking at the moment. I do plan to invest in a new logo soon. I want to take Laravel.io to the next level but that will require more than I can offer myself at the moment.

It’s because of that reason that I’ve decided that I will start with ads on the portal and pastebin in a few days. I know this is probably not what you want to hear but at the time I don’t see a better way to start gaining funds which I can use to re-invest into Laravel.io. I’ve taught about this long and hard and it was a difficult choice but in the end I think this is the best choice for the project to move forward. I’ll also be looking into sponsoring opportunities and perhaps set up a Patreon account so I can gather some extra funds that way. If I can gather enough funds I can invest into a better UI and it would allow me to invest more time into the project so I can get back to PRs & feedback faster and push out new features more rapidly. In the end I’m convinced this will benefit the project more than the pace I’m working at now.

Speaking about new features, I’ve already written out [a few smaller improvement and feature issues](https://github.com/laravelio/portal/issues). Nothing major but some of them like the forum notifications have been requested since long. Since this project is open source, everyone is free to pitch in and discuss how they feel about how these features should be implemented and even work on together to make them happen. I’m more than welcome to contributions from the community. Some of you already have started to help out and I really appreciate that, thanks! I still have lots of ideas on how to improve the portal but some things will require more time and work.

It took a long time and quite some effort but I’m really glad how everything turned out. I’m very excited for Laravel.io’s future and I hope you are too. I invite you to take a look at [Laravel.io’s new source code](https://github.com/laravelio/portal) and if you have questions, just [open a Github issue](https://github.com/laravelio/portal/issues/new) and I’ll be happy to answer any.

Thank you for reading this and for your continued patience. And especially thank you to everyone who supported me over the past few years 🙏