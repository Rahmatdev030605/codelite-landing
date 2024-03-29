<?php

namespace App\Domains\Logic\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordHistory.
 */
class PasswordHistory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_histories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['password'];
}
