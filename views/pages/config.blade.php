---
title: Configuration
in_nav: true
nav_sort: 300
---

@extends('layouts.layout')

@section('content')
	@markdown

# Configuration

You can add as many configuration files as you need in the `config` directory.

All configurations can be retrieved in your views using `config('filename.foo')` - which would return the result of `foo` from the `config/filename.php` (or `.ini`, `json`, `.yml`, `.yaml`).

Example of retrieving a configuration key in a view:
```blade
<h1>Welcome to @{{ config('app.domain') }}</h1>
```

Which would return the "domain" value from the `config/app.yml` file:
```yaml
domain: Example.com
```

You can also pass a default variable as the second argument, which will be used if the configuration key is `NULL` or unset.
```blade
@{{ config('app.key', 'default-value') }}
```


## Arrays
The `config()` function uses dots as a "separator" for associative arrays.

Config example - `config/app.yml`
```yaml
links:
  github:
    title: GitHub
    url: 'https://github.com'

  google:
    title: Google
    url: 'https://google.com'
```

You can access the array in different ways.

Get a specific value:
```blade
GitHub link: @{{ config('app.links.github.url') }}
```

List all links in the array:
```blade
@@foreach (config('app.links') as $row)
	<a href="@{{ $row['url'] }}">@{{ $row['title'] }}</a>
@@endforeach
```



## Debugging Configuration

You can print the complete configuration array in your terminal using:

```console
$ capro config
```

If you only want to print a specific value, you can run: `capro config app.domain`

To print multiple configuration keys, run: `capro config app.domain app.email app.title`

If you need to `var_dump()` the variables to see the types of the values, you can add the `-d` or `--dump` flag, e.g.: `capro config -d` or `capro config app.domain -d`



## The Core Configuration File

The file `config/core.php` should be reserved for the Capro configuration. It can be used to change directory names and add template views.

If you want to change the directory names, e.g. if you want to save the build to a directory called "build" instead of "public",
you can do so by changing `config/core.php` file and set the value to "build".

- `public_dir` (default: `'public'`)
- `views_dir` (default: `'views'`)
- `views_cache_dir` (default: `'cache'`)
- `static_dir` (default: `'static'`)

Example of a `config/core.php`:
```php
{!! '<' . '?php' !!}
return [
	'public_dir' => 'build',
];
```

@endmarkdown


@endsection


