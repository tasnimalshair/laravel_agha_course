<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ProductTrait
{
    public function createProductImage($image)
    {
        if ($image) {
            $fileName = Str::random(10) . ' . ' . $image->getClientOriginalExtension();
            $filePath = "products/$fileName";
            Storage::disk('uploads')->put("products/$fileName", file_get_contents($image));
        }
    }
}
