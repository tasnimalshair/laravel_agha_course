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
    <table border="1">
        <thead>
            <th>{{ __('stores.index.name') }}</th>
            <th>{{ __('stores.index.phone') }}</th>
            <th>{{ __('stores.index.is_delivery') }}</th>
            <th>{{ __('stores.index.products') }}</th>
            <th>{{ __('stores.index.action') }}</th>
        </thead>

        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->phone }}</td>
                    <td>
                        @if ($store->is_delivery)
                            Yes
                        @else
                            No
                        @endif
                    </td>

                    <td>
                        @if (!$store->storeProduct->isEmpty())
                            <ul>
                                @foreach ($store->storeProduct as $s_product)
                                    <li>{{ $s_product->product->name ?? null }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td><a href="{{ route('stores.edit', [$store->id]) }}">{{ __('stores.index.edit') }}</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>
