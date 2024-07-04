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
        "subCategory_id"
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'subCategory_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'prod_color', 'product_id', 'color_id');
    }

}
