<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    use HasFactory;
    protected $table = 'career_form';
    protected $fillable = [
        'career_bef_title',
        'career_title',
        'career_desc',
        'our_team_image',
        'our_team_desc',
        'service_bef_title',
        'service_title',
        'service_desc',
        'job_bef_title',
        'job_title',
        'our_services_title',
        'our_desc_first',
        'our_desc_second',
    ];
}
