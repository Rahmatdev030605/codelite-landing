<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $table = 'home';  

    protected $fillable = [
        'hero_image',
        'hero_sub_image',
        'hero_bef_title',
        'hero_title',
        'hero_desc',
        'our_mdl_bef_title',
        'our_mdl_title',
        'our_mdl_sub_title',
        'product_bef_title',
        'product_title',
        'consult_client_bef_title',
        'consult_client_title',
        'consult_client_desc',
        'project_bef_title',
        'project_title',
        'project_desc',
        'article_bef_title',
        'article_title',
        'article_desc',
        'service_bef_title',
        'service_title',
        'service_desc',
    ];
}
