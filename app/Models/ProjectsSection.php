<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectsSection extends Model
{
    use HasFactory;

    protected $table = 'projects_section';
    protected $fillable = [
        'status',
        'page_type_id',
        'title',
        'heading',
        'sub_heading',
        'button_link',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}


