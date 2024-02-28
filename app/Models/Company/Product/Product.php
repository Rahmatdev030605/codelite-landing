<?php

namespace App\Models\Company\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'title',
        'image',
        'button_link',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategories::class, 'category_id');
    }
}
