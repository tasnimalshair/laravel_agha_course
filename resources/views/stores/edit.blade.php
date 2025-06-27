<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h2>Edit Store</h2>
    <form action="{{ route('stores.update', [$store->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $store->name }}">
        </div>

        <div>
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $store->phone }}">
        </div>

        <div>
            <label>Delivery</label>
            <input type="checkbox" name="is_delivery" @checked(old('is_delivery', $store->is_delivery))>
        </div>

        <button type="submit">Save</button>
    </form>
</body>

</html>
