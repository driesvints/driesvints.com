---
extends: _layouts.post
section: content
title: Blade Heroicons
date: 2020-04-01
---
By far my most favorite addition to Laravel 7 are [the new Blade components](https://laravel.com/docs/7.x/blade#components). There's all kinds of cool things you can do with them so I thought I'd share some of them with you.

I've built a new package called [Blade Heroicons](https://github.com/driesvints/blade-heroicons) to easily make use of the [Heroicons](https://github.com/refactoringui/heroicons) originally made [Steve Schoger](https://twitter.com/steveschoger) and [Adam Wathan](https://twitter.com/adamwathan). The packages provides a simple component based flow to include them in your Blade views.

```html
<x:icon-o-adjustments/>
```

You can also pass classes to your icon components:

```html
<x:icon-o-adjustments class="w-6 h-6 text-gray-500"/>
```

And if you want you can publish the raw SVG icons and use them like:

```html
<img src="{{ asset('vendor/heroicons/icon-o-adjustments.svg') }}" width="10" height="10"/>
```

## Compiling the components

To make this happen I created a Blade component for each icon. Here's the one for [`icon-o-adjustments.blade.php`](https://github.com/driesvints/blade-heroicons/blob/master/resources/views/components/icon-o-adjustments.blade.php):

```html
<svg fill="none" viewBox="0 0 24 24" stroke="currentColor" class="{{ $class ?? null }}">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
</svg>
```

In order to compile the components easily I wrote [a bash script](https://github.com/driesvints/blade-heroicons/blob/master/bin/compile.sh) that helped me automate the process. This saves me the work of doing everything by hand.

## Registering the components

To register the components I first load the Blade components from the package's service provider. I then iterate over a constant containing all the icon names and alias them with Laravel using the package's `::` notation. I also wrote [a bash script](https://github.com/driesvints/blade-heroicons/blob/master/bin/list.sh) to easily generate the icon names for the list.

```php
$this->loadViewsFrom(__DIR__ . '/../resources/views', 'heroicons');

collect(self::ICONS)->each(function (string $icon) {
    Blade::component("heroicons::components.icon-o-$icon", "icon-o-$icon");
    Blade::component("heroicons::components.icon-s-$icon", "icon-s-$icon");
});
```

## Conclusion

All in all it's a pretty small package but hopefully this will help you make use of Heroicons in your project more easily.

I'll be blogging more about Blade components soon so [follow me on Twitter](https://twitter.com/driesvints) to keep up to date. If you found the package useful, let me know!
