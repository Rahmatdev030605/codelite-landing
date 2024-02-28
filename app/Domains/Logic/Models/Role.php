<?php

namespace App\Domains\Logic\Models;

use App\Domains\Logic\Models\Traits\Attribute\RoleAttribute;
use App\Domains\Logic\Models\Traits\Method\RoleMethod;
use App\Domains\Logic\Models\Traits\Scope\RoleScope;
use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Class Role.
 */
class Role extends SpatieRole
{
    use HasFactory,
        RoleAttribute,
        RoleMethod,
        RoleScope;

    /**
     * @var string[]
     */
    protected $with = [
        'permissions',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return RoleFactory::new();
    }
}
