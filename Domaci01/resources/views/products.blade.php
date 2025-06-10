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
            <th>Action</th>
        </tr>
        @foreach ($products as $product )
        <tr style="border: 1px solid black">
            <td style="border: 1px solid black">{{ $product->name }}</td>
            <td style="border: 1px solid black">{{ $product->description }}</td>
            <td style="border: 1px solid black">{{ $product->price }}</td>
            <td style="border: 1px solid black">{{ $product->amount }}</td>
            <td style="border: 1px solid black">{{ $product->image }}</td>
            <td style="border: 1px solid black"><a href="/admin/delete-product/{{ $product->id }}" style="background-color: red; padding: 2px 10px; margin: 5px; color: #fff; border: 1px solid #fff;  ">Delete</a><a href="" style="background-color: blue; padding: 2px 10px; margin: 5px; color: #fff; border: 1px solid #fff;  ">Edit</a></td>

        </tr>

        @endforeach
    </table>


    @endsection