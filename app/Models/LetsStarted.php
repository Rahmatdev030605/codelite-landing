<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetsStarted extends Model
{
    use HasFactory;

    protected $table = 'lets_get_started_section';
    protected $fillable = [
        'status',
        'heading',
        'sub_heading',
        'button_link',
        'page_type_id',
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
    
}
