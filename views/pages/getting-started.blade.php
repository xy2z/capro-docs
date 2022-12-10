---
title: Getting Started
in_nav: true
nav_sort: 200
---

@extends('layouts.layout')

@section('content')
@markdown

# Getting Started


## Requirements
- PHP 7.4+
- Composer (installed in your path)


## Install

Install Capro globally

```console
$ composer global require xy2z/capro
```

Make sure your global composer binary dir is in your PATH, then you will be able to run `capro` as a shortcut for `vendor/bin/capro`.


## Create your new site

To create a new capro project directory, run:

```console
$ capro new <name>
```

This creates a new directory called `<name>`, adds default files and directories, downloads Composer dependencies, and finally builds the site in the public dir.

To view your site go to the directory `<name>/public` and run `php -S localhost:82` - your static site should now be available in your browser at http://localhost:82


## Build

When you have made changes to a file, you need to build it again. Make sure you are in the root directory of your project.

To build your site run:
```console
$ capro build
```

If you don't have Capro installed globally, or don't have the global composer binary directory in your PATH, you can also run:
```console
$ vendor/bin/capro build
```

Using the `capro` shortcut will run the exact same `vendor/bin/capro` script in your project directory.

_Tip: `capro b` is an alias for "capro build"_.


### Serve Command
A "serve" command that automatically builds on each code change is currently under development.

For now you can setup your editor/IDE to automatically run `capro build` on each file save. For VS Code you can use [this plugin](https://marketplace.visualstudio.com/items?itemName=emeraldwalk.RunOnSave).


## Start Creating

You are now ready to create your new static site project.

### 1. Edit the Config
Edit the `config/app.yml` file to match your new project.
Example:
```yml
title: MyBlog
headline: Welcome to MyBlog
domain: myblog.example.com
url: https://myblog.example.com
email: info@myblog.example.com
```

### 2. Create a Layout

Create a layout template for all your pages and collections. You can create as many layouts and assets as you need.

Example of `views/layouts/layout.blade.php`
```blade
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@{{ $title }} - @{{ config('app.title') }}</title>
	</head>

	<body>
		<header>
			<h1>@{{ config('app.headline') }}</h1>
			...
		</header>

		<main>
			@@yield('main')
		</main>

		<footer> ... </footer>
	</body>
</html>
```

### 3. Add Pages

Any view you add in the `views/pages` directory, will automatically be built to a page. If you make a view called `views/pages/about.blade.php`, the page will be available at `http://localhost:82/about` after build.

At the top of each view, you can add an YAML Front Matter, which will turn into variables that are accessible to the view, the layout, and also the Capro class for filtering collections.

Example of `/views/pages/about.blade.php`
```blade
{{ '--' . '-' }}
title: About Me
{{ '--' . '-' }}

@@extends('layouts.layout')

@@section('main')
	<h1>@{{ $title }}</h1>

	Hi, my name is...
@@endsection
```

The `title` we set in the about page's YAML Front Matter is also be used in the layout's `<title>`


### 4. Build
Build Capro using and run a PHP serve.
```
capro build
cd public
php -S localhost:82
```
Now you should be able to see your new About page using the Layout view at <a href="http://localhost:82/about" target="_blank">http://localhost:82/about</a>


## Capro Directories

### Cache Directory
The cache directory is used to cache your views to make building faster. It is not recommended to include this directory in your git repository.


### Config Directory

The config directory automatically loads all files in the directory and makes all variables accessible via the `config()` function. [Read more about Configuration](/config).


### Public Directory
The public directory is used to store all static HTML files, this is the directory you want your webserver to point to. On each build, all files in the directory is deleted, and all files will be generated again.

If you want to add files (non-views) to the public directory, you can add them to the "static" directory.


### Static Directory

The `static` directory is where you want to store files like images, icons, videos, favicon, CSS, JS, documents, etc. - any static files that you want to be **public** to the visitors.

All content in the static directory will be copied to the public directory on every build. The public directory is emptied beforehand.

### Views Directory
This is where you store all your views. Pages are stored in `views/pages` and collections (e.g. blog posts, news, etc.) can be stored in `views/collections`. [Read more about views](/views).



@endmarkdown
@endsection
