---
title: Introduction
in_nav: true
nav_sort: 100
---

@extends('layouts.layout')

@section('content')

@markdown
# Capro - PHP Static Site Generator

Welcome to the documentation for Capro version 1.x. Capro follows [semantic versioning](https://semver.org/).

Capro is a static-site generator made in PHP, using the Blade template engine.


## <i class="fa-solid fa-triangle-exclamation"></i> Alpha
**NOTICE:** Capro is currently in alpha phase and has not been thoroughly tested for production usage. Also, this documentation is a work in progress. If you have any questions, feel free to ask in our <a target="_blank" href="{{ config('app.links.community.url') }}">Community</a> section on GitHub.




<!-- TODO: Make sure your Composer global bin is added to your PATH. -->
## Features
- Blade template engine (known from Laravel)
- Use as many Blade sections as you want in your views.
- Collections (e.g. blog posts, news, etc.) - without any configuration needed.
- API & View Templates - fill a template with data from an API, and turn it into pages.
- No default NPM/JavaScript files added.
- Supports custom directory names.
- Markdown support (might still have a few bugs during alpha).
- Capro class to fetch and filter all views (pages, collections and ViewTemplates).

<br>
<i>This documentation site was made using Capro v{{ CAPRO_VERSION }}</i>


@endmarkdown
@endsection

