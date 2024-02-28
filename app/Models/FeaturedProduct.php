<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    use HasFactory;

    protected $table = 'featured_product_section';
    protected $fillable = [
        'status',
        'title',
        'heading',
        'sub_heading',
        'button_link_1',
        'button_link_2',
        'page_type_id',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}
