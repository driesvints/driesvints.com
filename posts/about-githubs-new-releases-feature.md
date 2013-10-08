title: About Github's New Releases Feature
slug: about-githubs-new-releases-feature
status: published
date: 28 July 2013 9AM
tags: github, open-source, documentation
-------
A couple of weeks ago [Github released a new feature](https://github.com/blog/1547-release-your-software) called *Releases* which allows you to track a project's history and easily add a changelog and manage your project's binary assets. I'm very excited about this because we finally got a place where we have a good overview of each released version of our projects.<!--more-->

However, there's something that still bothers me. It's tightly coupled into Github which only allows us to enter the information into Github's Releases system. We can't transfer the data together with our Github repo if we decide to move the project from Github. We also can't versionize or collaborate on the changelogs through Pull Requests.

Back in June, [Github released another feature](https://github.com/blog/1528-there-s-a-map-for-that) which provides support for visualizing geographic data through `.geojson` files. This is a great way to provide a feature and still keep the data inside your repository so you can versionize and ship it with your project.

**Remember that the following is just a concept and doesn't actually work.**

The same idea could be applied to the Releases feature. Changelog information could be provided through, for example, a `changelog.json` file which resides in the project root. I've seen this being used in some projects like [Laravel](http://laravel.com/) where a `changes.json` file is kept [in the framework's source code](https://github.com/laravel/framework/blob/master/src/Illuminate/Foundation/changes.json).

Let's see how such a file could look like. I'm using the example from [the Github blog post](https://github.com/blog/1547-release-your-software).

~~~ .JSON
{
    "0.17.2": [
        "Use the git author as the TFS commiter during `git tfs rcheckin` (#336) and `git tfs rcheckin --quick` (#357)",
        "Improve temporary workspace handling (#328, #372)",
        "Use libgit2sharp more and git-core less (#361)",
        "Bug fix for bare repositories (#352)",
        "Bug fix for crash during `git tfs clone` (#349)",
        "Bug fix for VS2008 (#362)",
        "Update libgit2sharp",
        "Improved release process (#333, #340)"
    ]
}
~~~

Github automatically creates releases based on tags in your project. While it's not a problem that some things like binaries or indicating pre-leases aren't included, keeping the list of actual changes in the `changelog.json` file is a good way to keep track of changes throughout your project and ship it together with your project.

This can then be automatically generated on the Releases page for the associated release. The changelog information could be displayed beneath the release decription and you can still set other data for the release just like you can do now.

This same principle could also be used for documentation. A documentation folder inside your repository is an often used way of shipping docs with your source code. While a `README.md` file could technically provide all of the information about a repository, more complex projects require more extensive documentation.

Currently, Github repository wikis have their own repository. While you could just add it in your repository as a submodule, perhaps it would be a good idea to also provide a way for Github to generate a documentation section on a Github repo based on markdown files from a `docs` or `documentation` folder which resides in your project's root.

Just like wiki files, the documentation files could be Markdown files which represent different documentation pages. A `toc.json` file (table of contents) could be included to add navigation.

All of these changes don't need to clutter up your repository. They're optionally and you can make use of them if you want to. I'm just aiming at including data like changelogs and documentation directly into the repository and Github using that data to display it nicely on its website as Releases, Wiki pages or anything else they can think of.