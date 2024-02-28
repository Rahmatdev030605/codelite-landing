<?php

namespace App\Models\Company\Medsos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
    use HasFactory;
    protected $table = 'media_sosial';
    protected $fillable = [
        'medsos_image',
        'medsos_name',
    ];
}
