<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::query()->with('location')
            ->with('storeProduct.product')
            ->get();
        // $stores_list = config('myconfig.stores.lists');
        return view('stores.index')->with(compact('stores'));
    }
    public function create() {}
    public function store(Request $request) {}
    public function show($id) {}

    public function edit($id)
    {
        $store = Store::query()->find($id);
        return view('stores.edit')->with(compact('store'));
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $is_delivery = $request->input('is_delivery');

        Store::query()->find($id)->update([
            'name' => $name,
            'phone' => $phone,
            'is_delivery' => $is_delivery ? true : false
        ]);

        return redirect()->back();
    }

    public function destroy($id) {}
}
