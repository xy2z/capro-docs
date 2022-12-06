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

Capro is a static-site generator made in PHP, using the Blade template engine. See more features below.


## <i class="fa-solid fa-triangle-exclamation"></i> Alpha
**NOTICE:** Capro is currently in alpha phase, and has not been thoroughly tested for production usage. Also, this documentation is a work in progress. If you have any questions, feel free to ask in our <a target="_blank" href="{{ config('app.links.community.url') }}">Community</a> section on GitHub.


<!-- TODO: Make sure your Composer global bin is added to your PATH. -->
## Features
- Blade template engine (known from Laravel)
- Use as many Blade sections as you want in your views.
- Collections (e.g. blog posts, news, etc.) - without any configuration needed.
- API & Template Views - make a single view as a template, and turn it into pages with data via an API.
- No default NPM / JavaScript files added.
- Supports custom directory names.
- Markdown support (might still have a few bugs during alpha).
- Capro class to fetch and filter all views (pages, collections and API pages (ViewTemplates)).

<br>
<i>This documentation site was made using Capro v{{ CAPRO_VERSION }}</i>


@endmarkdown
@endsection
