<?php

namespace App\Http\Controllers\API\Store;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::query()->get();
        return response()->json($stores);
    }

    public function show($id)
    {
        $store = Store::query()->find($id);
        return response()->json($store);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required'
        ]);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $is_delivery = $request->input('is_delivery');

        $result = Store::query()->create([
            'name' => $name,
            'phone' => $phone,
            'is_delivery' => $is_delivery,
        ]);

        $status = false;
        if ($result) {
            $status = true;
        }


        $json = [
            'status' => [
                'status' => $status,
                'message' => $status ? 'Added' : 'Failed',
                'code' => $status ? 201 : 500
            ],
            'data' => $result ? $result : []
        ];
        return response()->json($json);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required'
        ]);

        $name = $request->input('name');
        $phone = $request->input('phone');
        $is_delivery = $request->input('is_delivery');

        $result = Store::query()->find($id)->update([
            'name' => $name,
            'phone' => $phone,
            'is_delivery' => $is_delivery
        ]);

        $status = false;
        if ($result) {
            $status = true;
        }
        return response()->json(['status' => $status]);
    }

    public function destroy($id)
    {
        $result = Store::query()->find($id)->delete();
        $status = false;
        if ($result) {
            $status = true;
        }
        return response()->json(['status' => $status]);
    }
}
