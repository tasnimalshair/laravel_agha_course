<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'discount', 'color', 'brand_id', 'image', 'created_by'];
    protected $appends = ['image_url'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function storeProduct()
    {
        return $this->hasMany(StoreProduct::class);
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('uploads')->url($this->image);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
