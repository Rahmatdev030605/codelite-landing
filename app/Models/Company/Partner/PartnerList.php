<?php

namespace App\Models\Company\Partner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerList extends Model
{
    use HasFactory;
    protected $table = 'partners_list';
    protected $fillable = [
        'partner_title',
    ];
}
