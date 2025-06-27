<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandContoller extends Controller
{
    public function index()
    {
        $brands = Brand::query()->with('products')->get();
        // dd($brands);
        return view('brands.index')->with(compact('brands'));
    }
}
