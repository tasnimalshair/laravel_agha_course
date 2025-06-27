<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Stores</h1>
    <form action="{{ route('products.index') }}" method="get">
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price">
        </div>

        <button type="submit">Search</button>
    </form>


    <table border="1">
        <thead>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>After Discount</th>
            <th>Color</th>
            <th>Brand</th>
            <th>Action</th>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img src="{{$product->image_url}}" width="150" height="100" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                    <td>{{ $product->price - $product->discount }}</td>
                    <td>{{ $product->color }}</td>
                    <td>{{ $product->brand->name ?? null }}</td>
                    <td><a href="{{ route('products.edit', [$product->id]) }}">Edit</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $products->links() }} --}}
</body>

</html>
