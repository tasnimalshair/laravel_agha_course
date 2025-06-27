<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'phone', 'is_delivery'];

    public function location()
    {
        return $this->hasOne(Location::class);
    }

    public function storeProduct()
    {
        return $this->hasMany(StoreProduct::class);
    }
}
