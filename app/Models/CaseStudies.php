<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudies extends Model
{
    use HasFactory;
    protected $table = 'case_studies_section';
    protected $fillable = [
        'status',
        'title',
        'heading',
        'button_link_1',
        'button_link_2',
        'button_link_3',
        'button_link_4',
        'button_link_5',
        'page_type_id',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}
