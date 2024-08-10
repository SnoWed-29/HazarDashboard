<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdColor extends Model
{
    use HasFactory;

    protected $table = 'prod_color';

    protected $fillable = [
        'product_id',
        'color_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }

    public function sizes()
    {
        return $this->hasMany(ProdColorSize::class, 'prod_color_id');
    }

   
}
