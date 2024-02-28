<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogForm extends Model
{
    use HasFactory;

    protected $table = 'blog_form';
    protected $fillable = [
        'blog_bef_title',
        'blog_bef_title',
        'blog_desc',
        'featured_product_bef_title',
        'featured_product_title',
    ];
}
