<?php

namespace App\Domains\Logic\Models;

use App\Domains\Logic\Models\Traits\Relationship\PermissionRelationship;
use App\Domains\Logic\Models\Traits\Scope\PermissionScope;
use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Class Permission.
 */
class Permission extends SpatiePermission
{
    use PermissionRelationship,
        PermissionScope;
}
