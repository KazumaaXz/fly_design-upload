<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

   protected $fillable = [
    'name',
    'slug',
];
    /**
     * Get the route key name for model binding.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // Relasi ke produk
    public function products()
    {
        return $this->hasMany(Product::class, 'type_id');
    }
       
}

