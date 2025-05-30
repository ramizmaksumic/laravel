    @extends('layout')

    @section("heading")

    <?php $heading = "Home";
    echo $heading; ?>
    @endsection


    @section("glavnastranica")

    <h1>Home</h1>

    @if ( $sat < 12)
        <p>Dobro jutro, trenutno je {{ $sat }} sati.</p>
        @else
        <p> Dobar dan, trenutno je {{ $sat }} sati. </p>


        @endif
        <p>Trenutno vrijeme je: {{ $trenutnoVrijeme }} i tačno je: {{ $sat }} sati.</p>
        @endsection