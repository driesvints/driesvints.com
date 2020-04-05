---
extends: _layouts.post
section: content
title: The Beauty of Single Action Controllers
date: 2020-04-04
---
Yesterday Jeffrey Way [posted a tweet](https://twitter.com/jeffrey_way/status/1246078499632353284) where he asked if people prefer to name their controllers singular or plural. [I replied](https://twitter.com/driesvints/status/1246079812663418882) that I did neither and used Single Action Controllers. What ensued was a stream of replies from people agreeing, disagreeing or even [doing the weirdest things](https://twitter.com/adamwathan/status/1246083603236257793).

Because of the overwhelming reactions I wanted to do a writeup on why I love Single Action Controllers and why I think they're a thing of beauty.

First of all, I want to start by saying that there isn't a single truth to this. As always, I want to point out that everything boils down to your personal preference. I can only teach, suggest and point out a few things but it's up to you to agree, disagree, adapt, learn, and/or adjust. Or not. Take from this post what you want and do whatever you feel comfortable with.

## CRUD vs Domain Modelling

Let's start by looking at why we tend to write resourceful CRUD controllers. I believe a lot of people go down this path and stick with it because it's the standard way of doing things in Laravel and most of the examples in the documentation show this exact usage. Or perhaps it's what you mostly see in blog posts or other apps.

But if you stop and think for a second, is it the best way to write them? Or software in general? In recent years I've invested a lot of time in things like Domain Driven Design and thinking about software in terms of how it applies to the domain you're working in and the processes that it translates to. When you start thinking in terminology and phrasing that mimics the ubiquitous language of your domain you'll notice that your code will become much clearer and to the point.

> In the end, I believe the essence of writing software is to implement your domain processes in the most readable and maintainable way possible.

Resourceful controllers lack quite a bit in those terms. First of all, they're not readably because you tend to model them according to your data and not your domain. You lose a context this way. You're telling *how* data is being processed but there's no explanation of what's going on and which process you're handling.

Secondly, you're not optimizing for maintainability. Since you're modeling according to your data structures, you are also coupling yourself to it. Indeed, your domain model is constantly evolving but so is your data structure. And if your data structure handles multiple processes or multiple parts of your domain it's going to be hard for you to make adjustments.

## A Practical Example

Since the theory is boring and you're here for code, let's look at a practical example. 

Say you're building an app that allows your users to organize events. You want to offer a way to create, update and delete those events. This is a very CRUD way to think about your process. Let's see how this translates in terms of a resourceful controller.

First let's look at the routes:

```php
Route::get('events', [EventController::class, 'index']);
Route::get('events/create', [EventController::class, 'create']);
Route::post('events', [EventController::class, 'store']);
Route::get('event/{event}', [EventController::class, 'show']);
Route::get('events/{event}/edit', [EventController::class, 'edit']);
Route::put('events/{event}', [EventController::class, 'update']);
Route::destroy('events/{event}', [EventController::class, 'destroy']);
```

And now the controller itself:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Event;

final class EventController
{
    public function index()
    {
        // ...
    }
    
    public function create()
    {
        // ...
    }
    
    public function store()
    {
        // ...
    }
    
    public function show(Event $event)
    {
        // ...
    }
    
    public function edit(Event $event)
    {
        // ...
    }
    
    public function update(Event $event)
    {
        // ...
    }
    
    public function destroy(Event $event)
    {
        // ...
    }
}
```

Our `EventController` holds all of the CRUD actions to display a list of events, show a specific event, create a new event, update an existing event and delete an event.

Let's take a look at the `index` method in detail:

```php
public function index()
{
    $events = Event::paginate(10);
    
    return view('events.index', compact('events'));
}
```

In our method, we retrieve events and feed them to a view that'll display them in a paginated list. So far so good. But now you want to implement a way for them to view past events and upcoming events through separate pages. Let's see how we'd implement that in our `index` method:

```php
public function index(Request $request)
{
    if ($request->boolean('past')) {
        $events = Event::past()->paginate(10);
    } elseif ($request->boolean('upcoming')) {
        $events = Event::upcoming()->paginate(10);
    } else {
        $events = Event::paginate(10);
    }
    
    return view('events.index', compact('events'));
}
```

Urgh, that looks messy. Even though we already make use of Eloquent scopes to hide the query logic involved, there's still an ugly chain of if statements here. Let's see how we can solve that using Single Action Controllers instead. 

> Single Action Controllers are controllers that do one thing and one thing only.

First of all, instead of making use of query parameters to differentiate the list of events, we'll make use of dedicated routes.

```php
Route::get('events', ShowAllEventsController::class);
Route::get('events/past', ShowPastEventsController::class);
Route::get('events/upcoming', ShowUpcomingEventsController::class);
```

This is a bit more verbose than our previous single route but if you look at it it's much more expressive. You can immediately identify which controller holds which logic for a specific scenario. If you compare the URI's you'll see a slight improvement in readability:

```
# Before
/events
/events?past=true
/events?upcoming=true

# After
/events
/events/past
/events/upcoming
```

Now let's look at one of our new controllers. Let's pick the `ShowUpcomingEventsController` controller:

```php
<?php

namespace App\Http\Controllers;

use App\Models\Event;

final class ShowUpcomingEventsController
{
    public function __invoke()
    {
        $events = Event::upcoming()->paginate(10);
    
        return view('events.index', compact('events'));
    }
}
```

Our ugly `if` statement is gone and has made way for the same readable three liner we had from our first CRUD controller example. But instead of having all of the other CRUD operations we now have a dedicated controller for a dedicated action.

Simple, readable and maintainable.

You might ask yourself if this is worth it all and if the previous `if` statement wasn't all that bad after all. But the thing I'm trying to show you here is that you're ** optimizing for future change** and improving maintainability. Next time you'll need to do specific changes to any of these three pages, you'll know exactly where to do them and without having to update a difficult if statement.

Of course, the above example is very simple so let's look at a more complicated one. Let's try to refactor our `create` and `store` methods:

```php
public function create()
{
    return view('events.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'start' => 'required',
        'end' => 'required|after:start',
    ])

    $event = Event::create($data);
    
    return redirect()->route('event.show', $event);
}
```

What we could do here is move these two methods to a dedicated controller which better explains what these methods do in terms of the actual process. These methods would be served better in a controller called `ScheduleNewEventController`. Let's update our routes to this new controller:

```php
Route::get('events/schedule', [ScheduleNewEventController::class, 'showForm']);
Route::post('events/schedule', [ScheduleNewEventController::class, 'schedule']);
```

I'm not going to show you the actual controller because it holds the same two methods as above except that they're renamed to `showForm` and `schedule` to better represent what they do. Even though it's not a single action controller it's the same methodology of splitting up parts into dedicated controllers for dedicated actions in your app.

Now that you've seen examples of single action controllers you might be thinking that this is going to lead to lots and lots of files. But as a matter of fact, this isn't a problem at all. Files are inexpensive. It's better to have more and smaller maintainable files than larger and harder to parse ones. You can open a single action controller and quickly scan the code to know what it does.

What I also often do is group them into different directories that hold different parts of the domain. This makes it easier if you look at the controllers from a file structure point of view. 

Splitting up controllers also makes it much easier to look for a specific one. Imagine that you'd have to look for the controller that schedules new events. Now you can just search in your editor of choice by filename instead of a generic `EventController`.

## Alternative Situations

I've also been given the question if I do this for all my controllers. Not *always*. I tend to be strict and concise when naming my controllers but I'll also adapt to different situations as you always should. 

Of course, there are times where you still want to make use of resourceful controllers. For example when you're building RESTful APIs. Here, it makes sense to use these as you're often directly interacting with the data itself and not so much with the domain or any process. Apps like a CMS or Laravel Nova are perfect examples of this.

But when the need arises you should ask yourself if a solution more closer to your domain and process would be better. In the situations where you want to execute actions against your domain, something like GraphQL or an RPC like API could perhaps be better suited.

## Conclusion

I hope this was a bit insightful and you now have a better understanding of why I like single action controllers this much. I believe the combination of small classes, using ubiquitous language and explicit naming will lead to more maintainable code, even for your controllers, not just your domain objects. But like I said at the beginning of this post, take the parts that help and see what works for you and what doesn't.
