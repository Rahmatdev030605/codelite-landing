<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $table = 'hero_section';
    protected $fillable = [
        'status',
        'title',
        'heading',
        'description',
        'image',
        'sub_image',
        'highlight_1',
        'highlight_2',
        'highlight_3',
        'button_link_1',
        'button_link_2',
        'page_type_id',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }

}
