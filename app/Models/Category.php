<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'is_active'
    ];
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
    public function products()
    {
        return $this->hasManyThrough(Product::class, SubCategory::class, 'category_id', 'subCategory_id');
    }
}
