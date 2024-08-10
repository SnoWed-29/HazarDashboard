<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdColorSize extends Model
{
    use HasFactory;

    protected $table = 'prod_color_size';

    protected $fillable = [
        'prod_color_id',
        'size_id',
        'quantity',
    ];

    public function prodColor()
    {
        return $this->belongsTo(ProdColor::class, 'prod_color_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}

