@foreach ($allcontacts as $contact )

<p>{{ $contact->name }}</p>
<p>{{ $contact->email }}</p>

@endforeach