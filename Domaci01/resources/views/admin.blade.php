 @extends('layout')

 @section("heading")

 <?php $heading = "Add products";
    echo $heading; ?>
 @endsection

 @section("glavnastranica")


 <p>Putem ove forme možete dodati nove proizvode</p>
 <form action="/admin/add-products" method="POST" class="mt-4 flex flex-col w-3xl">
     @csrf
     <label for="name" class="text-xl font-bold">Naziv proizvoda</label>
     <input type="text" name="name" class="bg-white p-3 mt-2">
     <label for="description" class="text-xl font-bold">Description</label>
     <textarea name="description" id="" class="bg-white p-3 mt-2"></textarea>
     <label for="amount" class="text-xl font-bold">Amount</label>
     <input type="number" name="amount" class="bg-white p-3 mt-2">
     <label for="price" class="text-xl font-bold">Price</label>
     <input type="number" name="price" class="bg-white p-3 mt-2">
     <label for="image" class="text-xl font-bold">Image</label>
     <input type="file" name="image" class="bg-white p-3 mt-2">


     <input type="submit" value="Send" class="bg-blue-500 text-white font-700 p-3 mt-8">
 </form>

 @if ($errors->any())

 <p>Desila se greška: {{ $errors->first()  }}</p>

 @endif
 @endsection