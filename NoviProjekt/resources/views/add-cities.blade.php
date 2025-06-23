@extends('layout')

@section('heading', 'Add Cities')

@section ('main-section')
<div class="row flex flex-col mx-auto w-300">
    <p>Ovdje možete unijeti podatke za novi grad</p>
    <form class="flex flex-col mt-16" action="/add-citie" method="POST">
        @csrf
        <label for="name">Ime grada</label>
        <input class="bg-white py-3 rounded-xl" type="text" name="name">
        <label for="deg">Trenutna temperatura</label>
        <input class="bg-white py-3 rounded-xl" type="number" name="deg">
        <label for="description">Detaljan opis</label>
        <input class="bg-white py-3 rounded-xl" type="text" name="description">
        <input class="bg-blue-500 py-3 rounded-xl mt-6 text-white" type="submit" value="Unesi grad">
    </form>
</div>
@endsection