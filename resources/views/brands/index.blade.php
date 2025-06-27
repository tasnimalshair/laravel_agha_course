<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Brands</h1>
    <table border="1">
        <thead>
            <th>Name</th>
            <th>Country</th>
            <th>Products</th>
        </thead>

        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->country }}</td>
                    <td>
                        @if (!$brand->products->isEmpty())
                            <ul>
                                @foreach ($brand->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
