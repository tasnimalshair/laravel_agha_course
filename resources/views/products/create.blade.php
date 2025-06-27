@extends('styles.app')

@section('title')
    <h1>Products</h1>
@endsection

@section('contents')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('status'))
        @if (session('status'))
            <div class="alert alert-success">Added Successfully</div>
        @else
            <div class="alert alert-danger">An problem occured</div>
        @endif
    @endif

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>Price</label>
            <input type="number" name="price">
        </div>

        <div>
            <label>Discount</label>
            <input type="number" name="discount">
        </div>

        <div>
            <label>Color</label>
            <select name="color">
                <option></option>
                <option value="black">Black</option>
                <option value="red">Red</option>
                <option value="grey">Grey</option>
            </select>
        </div>

        <div>
            <label>Brand</label>
            <select name="brand_id">
                <option></option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="image">
        </div>

        <button type="submit">Save</button>
    </form>
@endsection
