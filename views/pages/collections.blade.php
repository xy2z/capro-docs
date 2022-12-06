---
core.disable_build: true
title: Collections
in_nav: true # not done yet..
nav_sort: 600
---

@extends('layouts.layout')

@section('content')
@markdown


# Collections

Coming soon.

Collections are basically a group of pages (referenced here as "views"), this can be used for blog posts, news articles.

You can have as many collections as you want, a view can only belong to a single collection.

All views in a collection is automatically build and public after build. To exclude a view from being build you can add "core.disable_build: true" in your yaml-front-matter.

## Create a New Collection

To make a new collection, simple make a directory in the `views` directory called `collections/<name>`. Then create a new blade file, the filename will be used in the URL, so an example could be `views/collections/posts/2022-12-01-december-update.blade.php`.

The URL for the post will be `example.com/posts/2022-12-01-december-update/ `

The content can be whatever you want, altough currently only HTML output is supported.

An example of a collection view:
```blade
{{ '--' . '-' }}
title: December Update
{{ '--' . '-' }}

@@extends('layouts.posts_layout')

@@section('post')
	<h1>⛄ December Update</h1>

	<p>...</p>
@@endsection
```

The view itself, and the layout it's using, can use any variable set in the yaml-front-matter. So in this example, you
might want to have something like this in your layout file:
```blade
<title>@{{ $title ?? 'Welcome' }}</title>
```



@endmarkdown
@endsection
