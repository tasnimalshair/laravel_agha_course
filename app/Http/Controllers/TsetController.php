<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TsetController extends Controller
{
    public function index()
    {
        $arr = [
            ['key' => 0, 'value' => '0'],
            ['key' => 1, 'value' => '1'],
            ['key' => 2, 'value' => '2'],
        ];

        $collection = collect($arr);
        $collection->push(['key' => 3, 'value' => '3']);
        // dd($collection->all());


        $arr = [
            (object)['name' => 'p1', 'price' => 20, 'color' => 'red'],
            (object)['name' => 'p2', 'price' => 30, 'color' => 'orange'],
            (object)['name' => 'p3', 'price' => 40, 'color' => 'white'],
        ];

        $products = collect($arr);
        $pro = $products->filter(function ($item) {
            return $item->price >= 30;
        });

        $prod = $products->map(function ($item) {
            $item->price_category = ($item->price > 20) ? 'expensive' : 'cheap';
        });

        dd($products);
    }
}
