---
title: Template Views (API Data)
in_nav: true # not done yet.
nav_sort: 500
---

@extends('layouts.layout')

@section('content')
@markdown

# Template Views (API Data)

View Templates can be used to turn data objects into static HTML files, all using the same template. E.g. can be retrieving blog posts from a headless CMS.

You can see a demo of this example here: [Cats Demo](/demo/cats)

## API Example: Cats!

Here's an API example using the [Guzzle package](https://packagist.org/packages/guzzlehttp/guzzle) (`composer require guzzlehttp/guzzle`), retrieving cat images/gifs from [Cat as a service (CATAAS)](https://cataas.com/).

`config/core.php`:
```php
{!! '<' . '?php' !!}

use xy2z\Capro\ViewTemplate;

function get_cats(int $limit = 10) {
	$client = new \GuzzleHttp\Client();
	$response = $client->request('GET', 'https://cataas.com/api/cats?skip=0&limit=' . $limit);
	$json = json_decode($response->getBody(), false);
	$cats = [];

	foreach ($json as $cat) {
		$cats[] = [
			'id' => $cat->_id,
			'tags' => $cat->tags,
		];
	}

	return $cats;
}


return [

	// Template Views (demo)
	'templates' => [

		// Cats
		new ViewTemplate(
			'cats', // label.
			'cat_template', // template_view. File: `views/templates/cat_template.blade.php`
			'/demo/cats/{id}', // result_path. The final URL for each item.
			get_cats(5), // items.
		),
	],

];
```

## Template View

Now we need to make the template each item will use, `views/templates/cat_template.blade.php`
```blade
<h2>Here's the cat:</h2>
<img src="https://cataas.com/cat/@{{ $id }}">
```
The template will have access to all the variables set in the `$items` array.


## List Items

View Templates are automatically turned into collections, and can be referenced by the `label` set in the ViewTemplate constructor.

Here's an example of a page that lists all cats: `views/pages/cats.blade.php`

{{-- Each ViewTemplate are turned into a Collection, with all the items available. --}}
{{-- Items are automatically made as an collection with the `label` name as `ViewTemplate` --}}

```blade
<ul>
	@@foreach (Capro::cats()->get() as $view)
		<li><a href="@{{ $view->href }}">@{{ $view->id }}</a></li>
	@@endforeach
</ul>
```


@endmarkdown
@endsection
