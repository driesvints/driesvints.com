---
extends: _layouts.master
section: content
title: "Using Laravel 4's Model Events"
publishedAt: "April 6 2013 21:44"
---
Laravel 4 beta 4 is hot off the press and it added a lot of new functionality to the framework. One of them are the newly added [Model events](http://four.laravel.com/docs/eloquent#model-events). You probably already knew about events in Laravel. Model events are basically the same but for Eloquent model event listeners. They get triggered on specific Model actions like saving a Model's data to the database or attempting to delete a model from the database. In this post I'm going to give you a couple of use-cases for them so you get a better understanding why they would be useful in your projects.<!--more-->

## Validate models before creating or updating them

This example is a bit stolen from the L4 docs but it's still a valid example. I'll try to explain a bit more extensive than the docs. Imagine you're creating a new model record or updating an existing one but you want to make sure some fields are validated before doing so. Now you could validate those fields on your controller but another way is to validate them directly inside your model and attaching a model event to it so it automatically will be validated every time you try to create or update a model.

Let's create a model for a blog post.

```php
class Post extends Eloquent {

    public function isValid()
    {
        return Validator::make(
            $this->toArray(),
            array(
                'title'  => 'required|max:100',
                'body'   => 'required',
                'source' => 'url'
            )
        )->passes();
    }

}
```

In the `Post` model we've added a function that will validate some model properties. We're making sure the post title and body is provided and that the title isn't longer than 100 characters. We're also checking if the source is a valid url. We're using Laravel 4's built-in Validator class to do the job. Notice the easy way to pass the model's properties to the validator by calling the `toArray` method on the model.

Let's set the Model events now.

	Post::creating(function($post)
	{
	    if ( ! $post->isValid()) return false;
	});

	Post::updating(function($post)
	{
	    if ( ! $post->isValid()) return false;
	});

Now every time a blog post gets created or is being updated, it will be validated first and the action will be cancelled if a value hasn't been set correctly. Inside the closure you can of course do some extra things like passing a message to an error log. You can set these event binders anywhere you like in your application as long as they're auto loaded. I would set them in my `app/start/global.php` file.

## Prevent deletion of records when they're still linked

Say you have an `Image` model which belongs to some `Gallery` models. Someone's trying to delete the image from the media library on your site but that could have some complications for some of the galleries on your site. You'd like for someone to de-link the image from your galleries first so you know it's not in use any more and you can safely delete it. Well, let's make that happen.

We'll create our models first. We need a `Gallery` and `Image` model with a many-to-many relationship.

	class Gallery extends Eloquent {

	    public function images()
	    {
	       return $this->belongsToMany('Image');
	    }

	}

	class Image extends Eloquent {

	    public function galleries()
	    {
	        return $this->belongsToMany('Gallery');
	    }

	}

Next we'll need to set the model event.

	Image::deleting(function($image)
	{
	    if (count($image->galleries)) return false;
	});

Now every time an image is about to be deleted, the model event will prevent it from being deleted when it is still linked to some galleries.

## Know who created and last updated a record

Here's a cool one. In most of your models you've probably added timestamps to your model to keep track of when a record got created and when it got last updated. But what about who did those actions? This is only for an app with an authentication system. I'm going to assume you have authentication all set up and a user is logged in through Laravel's authenticator. I'm also assuming you can only create or update posts when you're logged in.

First, we'll need to set two new columns on the model we're going to edit. Let's use our Post model. In the posts migration, add these two columns:

	$table->integer('created_by');
	$table->integer('updated_by');

These will be used to keep track of the user ID. The only other thing you need to do is setting up the model events.

	Post::creating(function($post)
	{
	    $post->created_by = Auth::user()->id;
	    $post->updated_by = Auth::user()->id;
	});

	Post::updating(function($post)
	{
	    $post->updated_by = Auth::user()->id;
	});

Every time a post is created or updated a record will be kept of who created the post or last updated it. You can now add functionality to your model to display that data on your site.

	class Post extends Eloquent {

	    public function createdBy()
	    {
	        return User::find($this->created_by)->name;
	    }

	    public function updatedBy()
	    {
	        return User::find($this->updated_by)->name;
	    }
	}

## Define model events multiple times

Model events can be defined multiple times. They're executed in the order you defined them. This can be handy if you want to separate logic into different events.

	Post::creating(function($post)
	{
	    // Do something here.
	});

	Post::creating(function($post)
	{
	    // Do something else here.
	});

## Using The boot Method In A Model

Besides registering Model events in the global scope of your application you can also register them directly inside your model through the static `boot` method. Let's set this up for one of the examples in this tutorial.

	class Post extends eloquent {

	    public static function boot()
	    {
	        parent::boot();

	        static::creating(function($post)
	        {
	            $post->created_by = Auth::user()->id;
	            $post->updated_by = Auth::user()->id;
	        });

	        static::updating(function($post)
	        {
	            $post->updated_by = Auth::user()->id;
	        });
	    }

	}

## Conclusion

These are just a few examples of what you can do with Model events. I'm sure you can come up with more clever use cases. If you do, blog about them and share them with the community! :)

Thanks for reading.
