<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTrueWord extends Model
{
    use HasFactory;
    protected $table = 'our_true_word_section';
    protected $fillable = [
        'status',
        'page_type_id',
        'title',
        'heading',
        'sub_heading',
        'desc_1',
        'desc_2',
        'image',
        'button_link',
    ];
    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}
