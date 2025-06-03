    @extends('layout')

    @section("heading")

    <?php $heading = "All Products";
    echo $heading; ?>
    @endsection


    @section("glavnastranica")

    <div class="flex justify-end">
        <div class="text-2xl text-blue-800 font-black rounded-full flex items-center justify-center mb-8 p-2">
            <a href="/admin/add-products">Unesite novi proizvod +</a>
        </div>
    </div>


    <table style="border: 1px solid black; width: 1200px; align-content:center">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Image</th>
        </tr>
        @foreach ($products as $product )
        <tr style="border: 1px solid black">
            <td style="border: 1px solid black">{{ $product->name }}</td>
            <td style="border: 1px solid black">{{ $product->description }}</td>
            <td style="border: 1px solid black">{{ $product->price }}</td>
            <td style="border: 1px solid black">{{ $product->amount }}</td>
            <td style="border: 1px solid black">{{ $product->image }}</td>

        </tr>

        @endforeach
    </table>


    @endsection