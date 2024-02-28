<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceForm extends Model
{
    use HasFactory;
    protected $table = 'ecommerce_form';
    protected $fillable = [
        'portfolio_bef_title',
        'portfolio_title',
        'portfolio_desc',
        'portfolio_image',
        'project_bef_title',
        'project_title',
        'project_desc',
    ];
}
