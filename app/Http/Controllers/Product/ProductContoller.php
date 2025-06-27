<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Traits\ProductTrait;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductContoller extends Controller
{
    use ProductTrait;

    public function index(Request $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');

        session('timezone', 'gaza');

        $products = Product::query()
            ->when($name, function (Builder $query) use ($name) {
                $query->where('name', $name);
            })
            ->when($price, function (Builder $query) use ($price) {
                $query->where('price', $price);
            })
            ->with(['brand', 'storeProduct.store'])->get();
        return view('products.index')->with(compact('products'));
    }


    public function create()
    {
        $brands = Brand::query()->select('id', 'name')->get();
        return view('products.create')->with(compact('brands'));
    }

    public function store(AddProductRequest $request)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $color = $request->input('color');
        $brand_id = $request->input('brand_id');
        $image = $request->file('image');
        // dd($request->hasFile($image));
        $filePath = null;
        $this->createProductImage($image);
        $status = false;

        $result = Product::query()->create([
            'name' => $name,
            'price' => $price,
            'discount' => $discount ? $discount : 0,
            'color' => $color,
            'brand_id' => $brand_id,
            'image' => $filePath,
            'created_by' => Auth::user()->id
        ]);
        if ($result) {
            $status = true;
        }
        return redirect()->back()->with(['status' => $status]);
    }
    public function show($id) {}

    public function edit($id)
    {
        $product = Product::query()->find($id);
        $brands = Brand::query()->select(['id', 'name'])->get();
        return view('products.edit')->with(compact(['product', 'brands']));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $discount = $request->input('discount');
        $color = $request->input('color');
        $brand_id = $request->input('brand_id');

        $result =  Product::query()->find($id)->update([
            'name' => $name,
            'price' => $price,
            'discount' => $discount,
            'color' => $color,
            'brand_id' => $brand_id
        ]);
        // dump($result);
        $status = false;
        if ($result) {
            $status = true;
        }
        return redirect()->back()->with('status', $status);
    }

    public function destroy($id) {}
}
