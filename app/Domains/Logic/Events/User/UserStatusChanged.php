<?php

namespace App\Domains\Logic\Events\User;

use App\Domains\Logic\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserStatusChanged.
 */
class UserStatusChanged
{
    use SerializesModels;

    /**
     * @var
     */
    public $user;

    /**
     * @var
     */
    public $status;

    /**
     * UserStatusChanged constructor.
     *
     * @param  User  $user
     * @param $status
     */
    public function __construct(User $user, $status)
    {
        $this->user = $user;
        $this->status = $status;
    }
}
