<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdColor extends Model
{
    use HasFactory;
    protected $table = "prod_color";
    protected $fillable = [
        'product_id',
        'color_id',
    ];
    
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'items', 'prod_color_id', 'size_id');
    }

   
}
