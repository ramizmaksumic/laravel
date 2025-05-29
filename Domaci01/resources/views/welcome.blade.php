    @extends('layout')

    @section("heading")

    <?php $heading = "Home";
    echo $heading; ?>
    @endsection


    @section("glavnastranica")

    <h1>Home</h1>
    <p>Trenutno vrijeme je: {{ date("h:i:s") }}</p>
    @endsection