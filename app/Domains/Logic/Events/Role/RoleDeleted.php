<?php

namespace App\Domains\Logic\Events\Role;

use App\Domains\Logic\Models\Role;
use Illuminate\Queue\SerializesModels;

/**
 * Class RoleDeleted.
 */
class RoleDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $role;

    /**
     * @param $role
     */
    public function __construct(Role $role)
    {
        $this->role = $role;
    }
}
