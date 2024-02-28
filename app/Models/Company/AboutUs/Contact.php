<?php

namespace App\Models\Company\AboutUs;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'company_contact';
    protected $fillable = [
        'no_telp_company',
        'email_company',
        'location_company',
    ];
}
