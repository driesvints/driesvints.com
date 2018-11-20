---
extends: _layouts.post
section: content
title: "About the FlyPHP issue"
publishedAt: "March 4 2014 00:15"
---
I rarely react to drama in the PHP community. Usually the fact just is that the reasons for said drama are just not worth caring about it. This one is.

## The issue

A few days ago some people took notice about [FlyPHP](http://flyphp.org/), a new PHP framework which obviously was just a copy of [Laravel](http://laravel.com/). There are quite some reactions from a lot of people who see this as plain theft from [Taylor](https://twitter.com/taylorotwell)'s work on Laravel. But is it really?

> Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so

Laravel is licensed under [the MIT license](http://opensource.org/licenses/MIT). The MIT license allows anyone to copy software and modify it to suit their needs or even distribute and sell it. Basically the MIT license allows anyone to do whatever they want with said software. It doesn't only allows anyone to fork Laravel and modify it, it also allows them to redistribute it as something entirely new. And that's exactly what [Allan Freitas](https://twitter.com/allanfreitas) did with FlyPHP.

But he took one diliberately action which he shouldn't have done. He changed the copyright on the MIT license. And that's something the MIT license specifically states not to do.

> The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

The original copyright holder, which is Taylor, should have been kept in the MIT license file. To fix this, [Taylor send in a Pull Request on Github](https://github.com/flyphp/flyframework/pull/1), urging Allan to re-add him as copyright holder. Should this get merged in soon, then this entire thing can be put to rest. If it doesn't gets merged in soon, Taylor still has the option to start [a DMCA Takedown](https://help.github.com/articles/dmca-takedown-policy) on Github. Github will examine the case and will be forced to conclude that the MIT license has been violated and will therefor take down the repositories related to FlyPHP. But then again, that's Taylor's choice and only he can make the request.

## The community's reaction

Now a little note on the community's reaction. I'm a bit shocked by seeing all of these [hatred reactions](https://github.com/flyphp/flyframework/pull/1#issuecomment-36435333). Also, all these call-to-actions to start a virtual lynch mob are totally uncalled for.

The next thing I'm going to say might sound a little harsh but it's the truth. You have no say in this matter. You can give your opinion, it's a free world, but deciding if FlyPHP should be removed is not up to you. It isn't even up to Taylor. He chose the MIT license when he released Laravel which allows people to redistribute it. Besides, he already stated that [he's perfectly fine with this as long as he gets re-added as the copyright holder](https://github.com/flyphp/flyframework/pull/1#issuecomment-36532724).

To be honest, I think this has blown way out of proportions. This isn't a way to solve problems. In fact, it never is. Instead of jumping in and accusing people first calmly observe the situation, ask around for more opinions and then form your own opinion based on the given facts. *Then* go in and give your opinion in *a mature way*.

## Make sure you choose the right license

Remember folks. Choosing the correct license isn't just deciding to slap the MIT license on all of your projects. Choosing a bad license can have severe consequenses for your project. In this case, if Allan kept the copyright for Taylor on the MIT license he wouldn't have done anything wrong.

If you want to prevent the above from happening to your own projects you should just get a more restrictive license. Then again, if you don't want people to copy your project you might want to reconsider making it open-source in the first place.

Remember, the entire purpose of open-sourcing your projects isn't just so people can send in pull requests to make your project better. It's also that people can copy your project and modify and/or extend it so it suits their needs and thus make better use of it.

## My personal opinion

My personal opinion on the matter? If he doesn't accepts the PR soon, Taylor should start the DMCA takedown soon and have the repositories removed. Once again, his choice.

That being said, I think we should just put this to rest. It's very hard to think that something like this will take off and get to the same proportions of adoption as Laravel did. Laravel has an incredible great and large community and someone who daily puts his heart and soul into it. If FlyPHP doesn't at least has a maintainer with the same attitude as Taylor I can only see it dying a silent death soon and just be added to the list of unused PHP frameworks out there.

PS. Ow, on a sidenote. Everyone reacting to trolls like Rob should really review their way of taking everything seriously on the internet :)
