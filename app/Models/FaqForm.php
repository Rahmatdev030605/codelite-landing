<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqForm extends Model
{
    use HasFactory;
    protected $table = 'faq_form';
    protected $fillable = [
        'faq_bef_title',
        'faq_title',
        'faq_desc',
        'faq_section_bef_title',
        'faq_section_title',
        'our_services_title',
        'our_services_desc_frs',
        'our_services_desc_sec',
    ];
}
