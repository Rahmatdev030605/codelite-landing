<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnersForm extends Model
{
    use HasFactory;

    protected $table = 'partners_form';
    protected $fillable = [
        'partner_bef_title',
        'partner_titlep',
        'partner_desc',
        'our_partner_bef_title',
        'our_partner_title',
        'our_partner_sub',
        'our_partner_image',
        'our_partner_desc',
        'partners_trusted_bef_title',
        'partners_trusted_title',
        'partners_trusted_desc',
        'partners_trust_title',
        'partners_trust_desc_firs',
        'partners_trust_desc_secn',
        'partners_trust_image',
        'team_title',
        'team_desc',
    ];
}
