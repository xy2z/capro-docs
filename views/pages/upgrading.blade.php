---
title: Upgrading
in_nav: true
nav_sort: 600
---

@extends('layouts.layout')

@section('content')
@markdown

# Upgrading Capro

You can keep track of new Capro releases on <a href="https://github.com/xy2z/capro/releases" target="_blank">GitHub Releases</a>. If you are using an RSS reader, you can add the GitHub Releases URL to get notified when a new release is out.


Capro follows <a href="https://semver.org/" target="_blank">Semantic Versioning</a>.


## Minor Upgrade

Minor upgrades should not contain any breaking changes.

<!-- How to upgrade your global "capro" -- and how to upgrade your site. -->
Upgrade your global capro package, if you have installed Capro installed globally via Composer (recommended).
```console
$ composer global update xy2z/capro
```

Upgrade your local project package:
```console
$ composer update xy2z/capro
```

@endmarkdown
@endsection
