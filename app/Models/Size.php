<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    public function prodColorSizes()
    {
        return $this->hasMany(ProdColorSize::class, 'size_id');
    }
}
