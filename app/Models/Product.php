<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'images',
        "description",
        "price",
        "is_active",
        "is_featured",
        "in_stock",
        "on_sale",
        "subCategory_id",
        "cost"
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'prod_color')
                    ->withPivot('id')
                    ->withTimestamps();
    }

    public function prodColorSizes()
    {
        return $this->hasManyThrough(
            ProdColorSize::class,
            ProdColor::class,
            'product_id', // Foreign key on prod_color table
            'prod_color_id', // Foreign key on prod_color_size table
            'id', // Local key on products table
            'id' // Local key on prod_color table
        );
    }
}
