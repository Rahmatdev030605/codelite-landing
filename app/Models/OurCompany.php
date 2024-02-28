<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCompany extends Model
{
    use HasFactory;

    protected $table = 'our_company_section';
    protected $fillable = [
        'status',
        'title',
        'heading',
        'sub_heading',
        'desc',
        'image',
        'button_link',
        'page_type_id'
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }

}
