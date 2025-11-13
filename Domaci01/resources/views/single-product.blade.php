 @extends('layout')

 @section("heading")

 <?php $heading = "Checkout stranica";
    echo $heading; ?>
 @endsection

 @section("glavnastranica")

 <form action="{{ route('shoping.cart', $product->id) }}" method="POST" class="mt-4 flex flex-col w-3xl">
     @csrf
     <input type="hidden" name="id" class="bg-white p-3 mt-2" value="{{ $product->id }}">
     <label for="name" class="text-xl font-bold">Naziv proizvoda</label>
     <input type="text" name="name" class="bg-white p-3 mt-2" value="{{ $product->name }}">
     <label for="description" class="text-xl font-bold">Description</label>
     <textarea name="description" id="description" class="bg-white p-3 mt-2">{{ $product->description }}</textarea>
     <label for="amount" class="text-xl font-bold">Amount</label>
     <input type="number" name="amount" class="bg-white p-3 mt-2" value="{{ $product->amount }}">
     <label for="price" class="text-xl font-bold">Price</label>
     <input type="number" name="price" class="bg-white p-3 mt-2" value="{{ $product->price }}">


     <input type="submit" value="Kupi" class="bg-blue-500 text-white font-700 p-3 mt-8 pointer">
 </form>

 @if ($errors->any())

 <p>Desila se greška: {{ $errors->first()  }}</p>

 @endif
 @endsection