    @extends('layout')

    @section("heading")

    <?php $heading = "Home";
    echo $heading; ?>
    @endsection


    @section("glavnastranica")



    @foreach ($products as $product )
    <div class="p-4 bg-white mb-3 hover:bg-blue-50">

        <p class="font-bold"><a href="">{{ $product->name }} - {{ $product->price }}</a></p>
        <p ">{{ $product->description }}</p>

    </div>


    @endforeach

    @endsection