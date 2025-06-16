 @extends('layout')

 @section("heading")

 <?php $heading = "Edit contact";
    echo $heading; ?>
 @endsection

 @section("glavnastranica")

 <h2 class="text-2xl font-bold">Kontakt podaci za: <span class="text-blue-600">{{ $id->name }}</span></h2>
 <p>Uredite podatke za navedeni kontakt</p>
 <form action="{{  route ('contact.update', $id->id)}}" method="POST" class="mt-4 flex flex-col w-3xl">
     @csrf
     @method('PUT')
     <label for="email">Email</label>
     <input type="email" name="email" id="email" class="bg-white" value="{{ $id->email}}">
     <label for="name">Ime i Prezime</label>
     <input type="text" name="name" id="name" class="bg-white" value="{{ $id->name}}">
     <label for="password">Password</label>
     <input type="password" name="password" id="password" class="bg-white" value="{{ $id->password}}">

     <input type="submit" value="Send" class="bg-blue-500 text-white font-700 p-3 mt-8">
 </form>
 @endsection