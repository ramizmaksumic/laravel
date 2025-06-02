 @extends('layout')

 @section("heading")

 <?php $heading = "Shop";
   echo $heading; ?>
 @endsection

 @section("glavnastranica")


 @foreach ($products as $product )
 <p>{{ $product->name }}</p>
 <p>{{ $product->description }}</p>

 @endforeach
 @endsection