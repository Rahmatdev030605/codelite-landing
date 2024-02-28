<?php

namespace App\Models\Company\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = [
        'name',
    ];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
