<?php

namespace App\Models\Company\Partner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    use HasFactory;
    protected $table = 'partners';
    protected $fillable = [
        'partners_image',
        'partners_name',
    ];
}
