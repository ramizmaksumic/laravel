    @extends('layout')

    @section("heading")

    <?php $heading = "Dashboard";
    echo $heading; ?>
    @endsection


    @section("glavnastranica")

    <div class="flex justify-end">
        <div class="text-2xl text-blue-800 font-black rounded-full flex items-center justify-center mb-8 p-2">
            <a href="/admin/add-products">Unesite novi proizvod +</a>
        </div>
    </div>



    @foreach ($products as $product )

    <div class=" p-4 bg-white mb-3 hover:bg-blue-50">

        <p class="font-bold"><a href="">{{ $product->name }} - {{ $product->price }}</a></p>
        <p ">{{ $product->description }}</p>

    </div>

   


    @endforeach
<br>
            
<a href=" /admin/all-products" class="bg-blue-800 p-3 mt-3 text-white font-bold">Vidi sve proizvode</a>
            <a href=" /admin/all-contacts" class="bg-blue-500 p-3 mt-3 text-white font-bold">Vidi sve kontakte</a>


            @endsection