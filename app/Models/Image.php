<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'is_thumbnail',
        'product_id'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
    use HasFactory;
}
