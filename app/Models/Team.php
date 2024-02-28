<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'team';
    protected $fillable = [
        'name',
        'age',
        'job',
        'profile_img',
        'link_linkedin',
        'link_instagram',
        'link_twitter',
        'email',
        'box_message_heading',
        'box_message_desc',
        'button_link',
    ];
}
