<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use HasFactory;

    protected $table = 'our_services_section';
    protected $fillable = [
        'status',
        'title',
        'heading',
        'description',
        'description_second',
        'image',
        'button_link',
        'page_type_id',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}
