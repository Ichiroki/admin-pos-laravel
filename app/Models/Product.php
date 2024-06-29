<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
        'image',
        'qty',
        'discount'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
