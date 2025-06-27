@extends('styles.app')

@section('title')
    <h2>Edit Product</h2>
@endsection

@section('contents')
    @if (session()->has('status'))
        @if (session('status'))
            <div class="alert alert-success">Saved</div>
        @else
            <div class="alert alert-danger">Failed to success</div>
        @endif
    @endif

    <form action="{{ route('products.update', [$product->id]) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>

        <div>
            <label>Price</label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>

        <div>
            <label>Discount</label>
            <input type="number" name="discount" value="{{ $product->discount }}">
        </div>

        <div>
            <label>Color</label>
            <select name="color">
                <option value="black" @selected(old('color', $product->color) == 'black')>Black</option>
                <option value="red" @selected(old('color', $product->color) == 'red')>Red</option>
                <option value="orange" @selected(old('color', $product->color) == 'orange')>Orange</option>
            </select>
        </div>

        <div>
            <label>Brand</label>
            <select name="brand_id">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id', $brand->id) == $product->brand_id)>{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="button" id="submit_btn">Save</button>
    </form>
    <script>
        $(document).ready(function() {
            $('#submit_btn').click(function(e) {
                e.preventDefault();
                j
                let s = confirm('r u sure?')
                if (s) {
                    $('form').submit();
                } else {
                    return;
                }
            })
        });
    </script>
@endsection
