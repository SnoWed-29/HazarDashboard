<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'prod_color')
                    ->withPivot('id')
                    ->withTimestamps();
    }

    public function prodColors()
    {
        return $this->hasMany(ProdColor::class, 'color_id');
    }
    
}
