<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsForm extends Model
{
    use HasFactory;
    protected $table = 'about_us_form';
    protected $fillable = [
        'company_bef_title',
        'company_title',
        'company_desc',
        'our_company_bef_title',
        'our_company_title',
        'our_company_sub',
        'our_company_image',
        'our_company_desc',
        'service_bef_title',
        'service_title',
        'service_desc',
        'our_team_bef_title',
        'our_team_title',
        'our_team_desc',
        'our_service_image',
        'our_service_title',
        'our_service_desc_frs',
        'our_service_desc_sec',
        'team_title',
        'team_desc',
    ];
}
