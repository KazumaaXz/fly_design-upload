<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_id',
        'title',
        'meta_desc',
        'slug',
        'description',
        'price',
        'discount',
        'stock',
        'sku',
        'image',
        'status',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke jenis
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    //  Hitung harga setelah diskon
    public function getFinalPriceAttribute()
    {
        if ($this->discount > 0) {
            return $this->price - ($this->price * $this->discount / 100);
        }
        return $this->price;
    }

    //  Persentase diskon
    public function getDiscountPercentageAttribute()
    {
        return $this->discount ?? 0;
    }
}
