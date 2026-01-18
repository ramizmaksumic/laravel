<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redis</title>
</head>

<body>

    <div>
        @foreach ($products as $product )

        <ul>
            <li>
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->description }}</p>
                <small>{{ $product->price }}</small>
            </li>
        </ul>

        @endforeach
    </div>

</body>

</html>