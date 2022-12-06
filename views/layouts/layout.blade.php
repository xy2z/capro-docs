<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="og:locale" content="{{ config('app.locale') }}" />
		<title>{{ $title }} | Capro Documentation</title>

		<link rel="stylesheet" type="text/css" href="/css/style.css?v{{ config('app.version') }}">

		{{-- Highlight.js --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/hybrid.min.css" integrity="sha512-ZVy0y7AnokL/xGtaRaWRgLYjhywJZdJwVFWXW9oihOpDIochH8JF0xWFK+Y1WJ5wTn3rn9LPZRFjxObuzvQUaQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		{{-- Google Fonts --}}
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

		@yield('styles')
	</head>

	<body>

		<div class="app">

			<div class="sidebar">

				<div class="sidebar-top">
					<h1>
						<a href="/"><img class="capro-logo" src="/capro-logo.png" alt="Capro Logo"></a>
					</h1>
					<p class="site-description">
						PHP static site generator<br>
						<strong>Alpha</strong>
					</p>
				</div>



				<div class="nav-header">DOCS</div>
				<nav>
					@foreach (Capro::pages()->where('in_nav', true)->orderBy('nav_sort')->get() as $page)
						<a
							href="{{ $page->href }}"
							{{--
								// TODO: Add 'active' class on the current page.
								// Awaiting we have variables available about current view.
								class="{{ (($page->href == '/') ? 'active' : '') }}"
							--}}
						>{{ $page->title }}</a>
					@endforeach
				</nav>

				{{-- External Links (from `config/app.yml`) --}}
				<div class="nav-header">LINKS</div>
				<nav>
					@foreach (Config::get('app.links') as $link)
						<a href="{{ $link['url'] }}" target="_blank">{{ $link['title'] }} <i class="fa-solid fa-up-right-from-square"></i></a>
					@endforeach
				</nav>

				<div class="credits">
					Built with Capro v{{ CAPRO_VERSION }}
				</div>
			</div>

			<main>
				{{-- Page URL: {{ $title }}
				<br>
				<hr> --}}

				@yield('content')


				{{-- TODO: Show Next/Prev buttons --}}
				{{-- @if (isset($nav_sort))
					nav_sort: {{ $nav_sort }}
					{{ Capro::pages()->whereHas('nav_sort')->whereExpr('nav_sort', '>' $nav_sort)->orderBy('nav_sort')->first()->href }}
				@endif --}}
			</main>

		</div>



		{{-- Scripts --}}
		{{-- Highlight.js + blade syntax support --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js" integrity="sha512-gU7kztaQEl7SHJyraPfZLQCNnrKdaQi5ndOyt4L4UPL/FHDd/uB9Je6KDARIqwnNNE27hnqoWLBq+Kpe4iHfeQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script type="text/javascript" src="https://unpkg.com/highlightjs-blade/dist/blade.min.js"></script>
		<script>
			// hljs.initHighlightingOnLoad();
			hljs.highlightAll();
		</script>


		{{-- Font Awesome icons (v6) --}}
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<script type="text/javascript" src="/js/script.js?v{{ config('app.version') }}"></script>

		@yield('scripts')
	</body>

</html>
