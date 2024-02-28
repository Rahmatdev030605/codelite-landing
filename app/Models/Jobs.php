<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $fillable = [
        'job_name',
        'job_desc',
        'job_qualification',
        'job_location',
        'job_salary',
    ];
}
