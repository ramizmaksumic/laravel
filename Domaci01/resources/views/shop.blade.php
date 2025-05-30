 @extends('layout')

 @section("heading")

 <?php $heading = "Shop";
   echo $heading; ?>
 @endsection

 @section("glavnastranica")


 @foreach ($products as $product )
 @if ($product == "Audi S5")
 <ul class="mt-8">
    <li><a class="text-blue-600" href="">{{ $product }} - EKSTRA SNIŽENJE</a></li>
 </ul>
 @else
 <ul class="mt-8">
    <li><a class="text-blue-600" href="">{{ $product }}</a></li>
 </ul>
 @endif

 @endforeach
 @endsection