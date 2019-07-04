---
extends: _layouts.post
section: content
title: Getting Started with Dotfiles
date: 2016-04-08
metaDescription: In this blog post I'll explain what dotfiles are, how you can use them and how to start with your own.
---
Let's draw a situation. Your computer breaks down. And I don't mean the classic "Dammit, my computer broke down, better get it fixed". No, I mean the "Oh shit, my HD is totally fried, I lost everything and there's no way on earth I'll ever get it back"-hell. Some day, you may experience this situation. If you're lucky you won't. But hey, luck runs out eventually.

Thankfully, these days we have something called 'The Cloud ☁️'. We're developers so we're probably smart enough to save all of our documents up on Dropbox, Google Drive, iCloud, Github or whatever floats up there. Right? ... Right?

*crickets*

Anyway, I can't help you with your documents. That's not why I'm writing this. Save your documents in the cloud! What I *can* help you with is your development environment. See, we all have specific ways of setting up our computer. It's all different somehow. The apps we use, our IDE settings, what shell we prefer, what programming languages we work with, the tools we prefer. How on earth are we going to get *that* specific setup back the way we had it before our computer broke down?

Enter dotfiles.

## Why Dotfiles?

Dotfiles basically contain the preferred setup of your computer. They usually come with a setup procedure so you can easily install everything again when you need to start from a fresh system. They're also really useful for syncing preferences across multiple devices.

A couple of months ago I had to re-install my computer a couple of times. And damn, that was quite the undertaking. Figuring out which apps I had to re-install, setting up my IDE again properly, losing all of my shell settings and aliases. Total pain. And something no one wants to do ever again. So I decided that the next time I needed to re-install my computer I'd be prepared. I wouldn't go through this ordeal ever again.

## Building My Own Dotfiles

I've known about dotfiles for quite a while now. I've seen various repositories from various people, but every single one of them seemed to be totally different. The reason for this is that dotfiles are very personal. There is no silver bullet or a *one way to rule them all* setup. When building your own dotfiles, you're going to see that you'll want to structure things to your own liking. And that is perfectly fine. [Take inspirations from other repositories](https://dotfiles.github.io/) and then use the parts which work for you.

Building [my own dotfiles](https://github.com/driesvints/dotfiles) was just like that. I dove deep down into several repositories and found incredible ways to tweak my setup or organize things. Let me show you how I tackled structure for my own dotfiles.

### Topical Organization

I started out with the repository everyone probably starts from when they're looking for a good example of dotfiles. [Zach Holman's dotfiles are superb.](https://github.com/holman/dotfiles) I suggest you [read his own excellent blog post](https://zachholman.com/2010/08/dotfiles-are-meant-to-be-forked/) on the subject.

What Zach uses is called Topical Organization, which means he organizes the different parts of his dotfiles in directories, each entitled to a specific subject. His git settings are in a `git/` directory, his Ruby scripts are in `ruby/`, etc.

This seemed like a great way to organize things and eventually I ended up with [this](https://github.com/driesvints/dotfiles/tree/7cb1ea6eff77921d16a3376a2172f96425e93181). Everything neatly tucked away in its own directory with their own aliases, path settings, etc. separated.

I now had a good structured and working setup for my dotfiles.

### A Simpler Structure

But then I started thinking in terms of *why* I wanted to separate things so much. Each directory only contained a handful of files and each of those files only a few rules. Why would I want to separate everything if everything could be done much simpler by just organizing it top-level?

And thus my quest began to greatly simplify things. When I was finished I ended up with [this](https://github.com/driesvints/dotfiles/tree/f6321eed4852578c5c23894dcb22814851efd8d1). As you can see it is much cleaner than the previous version. Everything is organized in just a handful of files that aren't very large. This means that they are much more maintainable and easier to understand.

In the end this proved to be the right choice. Tools like Mackup and a Brewfile helped greatly in reducing the amount of files I needed. Let's take a look at the final result.

## The Different Parts

### macOS Preferences

My main OS of choice is macOS. Being the Apple fanboy that I am, I thoroughly enjoy the way it syncs all of my data across my devices through iCloud. I wouldn't want to trade it in for any other OS at the moment. Although iCloud is great, it doesn't yet syncs your macOS preferences across your Macs. I have a Macbook at home and a Macbook from work so if I change a setting on one of my Macs, it doesn't automatically apply to the other one. Luckily we have a dotfile to help out with that.

[Mathias Bynens's dotfiles](https://github.com/mathiasbynens/dotfiles) is one of the more popular ones out there. His [`.macos` dotfile](https://github.com/mathiasbynens/dotfiles/blob/master/.macos) features a range of macOS preferences and is something probably everyone wants when working with macOS. Now syncing your preferences is easy. Just pull in the latest commit from your dotfiles, run `source .macos` and you're up to date.

### Homebrew

When running macOS, [Homebrew](http://brew.sh/) is essential. It helps you install packages and tools in an easy way through the CLI. It should probably be the first thing you install when setting up a new Mac.

Homebrew can also help install your apps. For that, you'll need [Homebrew Cask](https://caskroom.github.io/). You won't need to worry about manually downloading and installing packages and tools anymore. Cask can even install your preferred fonts. Apps from the app store still need to be installed manually, though.

To bring it all together in your dotfiles, you probably want to adopt a `Brewfile`. [Homebrew Bundler](https://github.com/Homebrew/homebrew-bundle) allows you to organize your system's dependencies in a single file so Homebrew knows what to install when installing from a fresh system. It's like [Composer](https://getcomposer.org/) but for your Mac. Feel free to take a look at [my own Brewfile](https://github.com/driesvints/dotfiles/blob/master/Brewfile) to see what tools and apps I've got installed. A simple `brew bundle` installs your dependencies.

### Mackup

Now we've talked about our macOS preferences and restoring our apps & tools but what about our application preferences? How are we going to make sure we can restore those if we need to re-install our Mac?

Meet [Mackup](https://github.com/lra/mackup). Mackup is a tool which backups your app preferences to a storage of your choice. By default it's Dropbox but you can easily use Google Drive, iCloud or any other synced folder you want. What it does is that it copies the settings from your `~/Library` folder and symlinks them from the storage folder. That way your settings stay consistent across devices. It's also very handy to restore your application's settings. Simply install your synced folder, Mackup first and then `mackup restore` to restore your settings.

Thanks to Maxime Fabre for giving [a great presentation on Homebrew and Mackup](https://speakerdeck.com/anahkiasen/a-storm-homebrewin) at the PHP Leuven UG!

### Z Shell

When developing you probably spend a lot of your time on the CLI. So a good setup of your shell is important. While Bash is a great shell [(and recently even got added to Windows 10)](http://www.theverge.com/2016/3/30/11331014/microsoft-windows-linux-ubuntu-bash), I prefer [Z Shell (Zsh)](http://www.zsh.org/).

Zsh is a powerful shell which features some great improvements over Bash like autocompletion, shared command history, themeable prompts and many other things. It's like Bash but on steroids. I've considered alternatives like [Fish Shell](https://fishshell.com/) but in the end Zsh proved to be the one that I like the most.

### Oh My, Wth Should I Use?

Like the way you have package managers for programming languages (think Composer, NPM, ...) you also have plugin managers for your shell. While a shell like Zsh is great, it's still difficult to configure it the way you like. A plugin manager like [Antibody](https://getantibody.github.io/) can greatly help with this by extending its base functionality.

You have a other solutions with Zsh frameworks like [Presto](https://github.com/sorin-ionescu/prezto) and I used [Oh-My-Zsh](https://ohmyz.sh) for a long time but in the end I switched to Antibody because of it's easy-to-use and simple setup.

You can easily [install plugins](https://getantibody.github.io/usage/) for your shell like the git plugin which offers shortcuts and autocomplete for your git commands or easily install themes to configure the look and feel of your shell. I've installed [the Minimal theme](https://github.com/subnixr/minimal) together with the [Solarized Light](https://github.com/altercation/solarized) color scheme in [Hyper](https://hyper.is).

## The Install Procedure

Now that I've shown you how I've set up my dotfiles let's take a look at how it all comes together when we try to re-install our Mac. I've written a step-by-step guide on how I can [install a fresh macOS setup](https://github.com/driesvints/dotfiles#a-fresh-os-x-setup) with my preferred settings and tools. Let me guide you through the steps.

First of all we need to update to the latest version of macOS. We do this first so that we have the latest versions of all the tools available. After we've installed the latest version, install Xcode from the App store. We'll need this for the command line tools. After installing it, open it and accept the license agreement. This is necessary to use some of the command line tools. Now install the command line tools by running `xcode-select --install`. Ok, this was the part that probably took the most time. Let's proceed to the next part.

First, copy your SSH keys to your `~/.ssh` folder and make sure they have the correct permissions. I sure hope you always keep those keys safe somewhere because they're basically your ID for the web. Now clone the repo to your machine. I'm gonna assume you're going to clone it to `~/.dotfiles`.

Before we run the setup, one more thing we need to do is append `/usr/local/bin/zsh` to our `/etc/shells` file. This will point to the Homebrew installed Zsh version. It doesn't matter for now that we haven't installed it yet but it's necessary before we can run the installer and set Zsh as our default shell.

Now run the installer by running `./install.sh`. Homebrew will be installed and will start installing your apps and tools from your `Brewfile`. Zsh will be set as your default shell. Composer will be installed with your preferred global packages. Lastly, the `.macos` file will be read to set your preferred macOS settings. Note that this will close your shell because it resets some processes at the end of the file.

After the install script has been run we're going to restore your app preferences. First make sure Dropbox (or whatever synced storage you've chosen for Mackup) is set up and install your remaining apps from the App Store. Now run `mackup restore` to restore your app preferences.

All you have to do to finish up is restart your Mac and you'll have the same setup the way you left it.

## Maintaining Your Dotfiles

Of course you'll still need to make sure that if you change anything to your system, your dotfiles need to be updated as well. This requires a bit of a different mindset.

Some pointers on maintaining your dotfiles:

- When installing a new app, tool or font, try to install it with Homebrew (Cask) and add it to your `Brewfile`
- When configuring a new app make sure to run `mackup backup` to save your preferences
- When changing an macOS setting, try setting it through the `.macos` file

If you follow these pointers you'll definitely make sure that your Mac will be restored the way you left it the next time you need to re-install.

## Conclusion

That's it for this blog post. I hope I've shown you enough in order to make you start with your own dotfiles. Take note that this is a highly opinionated post because I've mostly explained my preferred setup. Like I said before, dotfiles are a very personal thing. Look around at [other repositories](https://dotfiles.github.io/) and start building your dotfiles the way you like. If you need some help on getting started, I've dedicated a section of the readme in my dotfiles on helping you to [get started on your own dotfiles](https://github.com/driesvints/dotfiles#your-own-dotfiles).

Go build your own dotfiles and the next time when your computer crashes, it won't be that bad! 😄
