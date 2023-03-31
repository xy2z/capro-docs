---
title: View Templates (for API Data)
in_nav: true # not done yet.
nav_sort: 500
---

@extends('layouts.layout')

@section('content')
@markdown

# View Templates (for API Data)

View Templates can be used to turn data objects into static HTML files, all using the same template. E.g. for retrieving blog posts from a headless CMS.

## API Example: Cats!

Here's an API example using the [Guzzle package](https://packagist.org/packages/guzzlehttp/guzzle) (`composer require guzzlehttp/guzzle`), retrieving cat images/gifs from [Cat as a service (CATAAS)](https://cataas.com/).

You can see a working demo of this example here: [Cats Demo](/demo/cats)

First we need to tell Capro about our "ViewTemplate" - which consists of a label, the template name, the URL where the HTML files are built to, and finally an array of all the items which will be turned into HTML files.

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

	// ViewTemplate (demo)
	'templates' => [

		// Cats
		new ViewTemplate(
			label: 'cats',
			template_view: 'cat_template', // Points to: `views/templates/cat_template.blade.php`
			result_path: '/demo/cats/{id}',
			items: get_cats(5),
		),
	],

];
```
Since this ViewTemplate consists of 5 items (cats) it will generate 5 pages each saved to `public/demo/cats/{id}`.


## Make a View Template

Now we need to make a template that each of the item will use.

Create a new file: `views/templates/cat_template.blade.php`

```blade
<h2>Here's the cat:</h2>
<img src="https://cataas.com/cat/@{{ $id }}">
```
The template will have access to all the variables set in the `$items` array.


## List Items

Optionally, you might want to list all your items (cats) on a page. View Templates are automatically turned into collections and can be referenced by the `label` set in the ViewTemplate constructor.

Here's an example of a page that lists all cats. Create a new file: `views/pages/cats.blade.php`

{{-- Each ViewTemplate are turned into a Collection, with all the items available. --}}
{{-- Items are automatically made as an collection with the `label` name as `ViewTemplate` --}}

```blade
<ul>
	@@foreach (Capro::cats()->orderBy('id')->get() as $view)
		<li><a href="@{{ $view->href }}">@{{ $view->id }}</a></li>
	@@endforeach
</ul>
```

In this example, the `$view` variable has access to all the default View properties (`href`, `save_path`, etc.) - and also all the variables set in the `$items` array in the ViewTemplate.


@endmarkdown
@endsection
