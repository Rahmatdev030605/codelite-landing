<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamForm extends Model
{
    use HasFactory;
    protected $table = 'team_form';
    protected $fillable = [
        'team_bef_title',
        'team_title',
        'team_desc',
        'leadership_bef_title',
        'leadership_title',
        'leadership_desc',
        'features_bef_title',
        'features_title',
        'feature_desc',
        'our_team_bef_title',
        'our_team_title',
        'our_team_desc',
    ];
}
