<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBusinessConsulting extends Model
{
    use HasFactory;

    protected $table = 'home_business_consulting';

    protected $fillable = [
        'hero_bef_title',
        'hero_title',
        'hero_desc',
        'client_companies',
        'our_service_bef_title',
        'our_service_title',
        'our_service_desc',
        'company_spec_bef_title',
        'company_spec_title',
        'consult_client_bef_title',
        'consult_client_title',
        'news_bef_title',
        'news_title',
        'news_desc',
        'portfolio_bef_title',
        'portfolio_title',
        'portfolio_desc',
        'our_team_bef_title',
        'our_team_title',
        'our_team_desc',
        'testimonial_bef_title',
        'testimonial_title',
        'testimonial_desc',
        'contact_bef_title',
        'contact_title',
        'contact_desc',
    ];

}
