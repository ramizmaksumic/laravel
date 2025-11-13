 @extends('layout')

 @section("heading")

 <?php $heading = "Shop";
  echo $heading; ?>
 @endsection

 @section("glavnastranica")


 @foreach ($products as $product )

 <div class="flex flex-row gap-x-10">
   <div class="flex flex-col">
     <p>{{ $product->name }}</p>
     <p>{{ $product->description }}</p>

   </div>
   <div>
     <a href="{{ route('products.single', $product) }}" class="bg-yellow-500 px-3 py-2 rounded-md">Pogledaj proizvod</a>
   </div>

 </div>

 @endforeach
 @endsection