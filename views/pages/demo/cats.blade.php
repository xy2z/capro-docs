<h1>Capro Demo: Cats</h1>

<h2>List of cats:</h2>

@foreach (Capro::cats()->orderBy('id')->get() as $view)
	&bull; <a href="{{ $view->href }}">{{ $view->href }}</a><br>

	{{-- <img src="https://cataas.com/cat/{{ $view->id }}">
	<br><br> --}}
@endforeach

<br>
<br>
<hr>
<a href="/">&larr; Back to Capro Docs</a>
