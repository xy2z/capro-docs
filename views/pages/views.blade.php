---
title: Views
in_nav: true
nav_sort: 400
---

@extends('layouts.layout')

@section('content')
@markdown

# Views

Views are what will be build into static HTML files. Capro uses the Blade template engine, known from Laravel.


## Directories
In the `views` directory, there's three reserved subdirectory names:

- **Pages** (`views/pages/`) - for "regular" pages. E.g. `views/pages/about.blade.php` will be build to `domain.tld/about/`.
- **Collections** (`views/collections/`) - for static blade collections, e.g. blog post, news, etc. Where each collection view is a `*.blade.php` file.
- **Template Views** (`views/templates`) - can be used to build data objects into pages, using a specific template. E.g. json data from an API. See [Template Views](/template-views).

By default all pages and collections are build to the public directory, unless the `core.disable_build: true` is set in the YAML Front Matter of the view.

Other than that, you are free to create the directories you need.


## YAML Font Matter

You can add YAML Front Matter to your views, but only the views inside the above directories. You cannot add YAML Front Matter to a layout or other "subviews". It is completely optional to use.

The YAML is set at the top of a view, and will be available as variables to the view itself, layout, subviews (includes, etc.) and the Capro fluent interface.

Example of YAML Front Matter in the index page view `views/pages/index.blade.php`
```blade
{{ '--' . '-' }}
default_title: Welcome!
core.disable_build: true
{{ '--' . '-' }}
```

{{-- All variables will also be available in the `Capro` class, which is a fluent interface that can be used to retrieve views, e.g. to list navigation links or list blog posts, etc. --}}


## Pages
To create a new page, simply add a new file in the `views/pages` directory, e.g. `views/pages/about.blade.php`

Example:
```blade
{{ '--' . '-' }}
title: "About Me"
{{ '--' . '-' }}

@@extends('layouts.master')

@@section('main')
	<h1>About</h1>
	...
@@endsection
```

The page will be build to `public/about/index.html` and can be linked to just as `domain.tld/about/`

When using `@@extend()` and `@@include()` the root directory will be set to `views/`, so if you want to get a view from an include folder, e.g. `views/layouts.matser.blade.php` you can refer to it as `'layouts.master'`.



## Collections
Collections is a great way to group views, the best example is probably for blog posts. If we were to make blog posts as pages, they would not be grouped together, and it will be harder to show related blog posts, generate RSS feeds, list blog posts, etc.

Collections doesn't need any configuration to work, all you need to do is create a view. Let's create a new `views/collections/blog/hello-world.blade.php` in the `blog` collection.

```blade
{{ '--' . '-' }}
title: "Hello World!"
{{ '--' . '-' }}

@@extends('layouts.blog_layout')

@@section('main')
	<h1>Hello World!</h1>
@@endsection
```

If you want to create collections with data from an API, you can use [Template Views](/template-views).


## Difference Between a Page and a Collection?

As you can see, pages and collections look very alike. So what is the difference exactly?

The main difference is the URL, a collection will always have the collection name added to the URL.

- A page view `views/pages/contact.blade.php` will be available at `domain.ltd/contact/`.
- A blog collection view `views/collections/posts/2023-01-01-hello-world.blade.php` will be available at `domain.tld/posts/2023-01-01-hello-world/`.

In the Capro class pages have their own "group", and each collection will be in their own group. To get all pages call `Capro::pages()->get()`, and to get all views from a "posts" collection call `Capro::posts()->get()`


@endmarkdown
@endsection
