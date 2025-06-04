@foreach ($predmeti as $predmet)

<p>{{ $predmet->predmet }} : {{ $predmet->ocena }} :{{ $predmet->profesor }} </p>

@endforeach

<a href="/add-predmet">Dodaj novi predmet</a>