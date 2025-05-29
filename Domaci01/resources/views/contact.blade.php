 @extends('layout')

 @section("heading")

 <?php $heading = "Contact Us";
   echo $heading; ?>
 @endsection

 @section("glavnastranica")

 <h2 class="text-2xl font-bold">Kontakt podaci</h2>
 <p>Za sve informacije možete nas kontaktirati putem ove kontakt forme</p>
 <form action="/" class="mt-4 flex flex-col w-3xl">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="bg-white">
    <label for="name">Ime i Prezime</label>
    <input type="text" name="name" id="name" class="bg-white">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="bg-white">

    <input type="submit" value="Send" class="bg-blue-500 text-white font-700 p-3 mt-8">
 </form>
 @endsection