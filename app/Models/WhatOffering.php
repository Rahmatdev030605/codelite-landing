<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatOffering extends Model
{
    use HasFactory;
    protected $table = 'what_offering_section';
    protected $fillable = [
        'status',
        'page_type_id',
        'title',
        'heading',
        'sub_heading',
        'desc',
        'image',
        'button_link'
    ];

    public function scopeByPageType($query, $pageTypeId)
    {
        return $query->where('page_type_id', $pageTypeId);
    }
}

