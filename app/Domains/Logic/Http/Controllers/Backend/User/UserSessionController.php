<?php

namespace App\Domains\Logic\Http\Controllers\Backend\User;

use App\Domains\Auth\Http\Requests\Backend\User\ClearUserSessionRequest;
use App\Domains\Logic\Http\Requests\Backend\User\ClearUserSessionRequest as UserClearUserSessionRequest;
use App\Domains\Logic\Models\User;

/**
 * Class UserSessionController.
 */
class UserSessionController
{
    /**
     * @param  ClearUserSessionRequest  $request
     * @param  User  $user
     * @return mixed
     */
    public function update(UserClearUserSessionRequest $request, User $user)
    {
        $user->update(['to_be_logged_out' => true]);

        return redirect()->back()->withFlashSuccess(__('The user\'s session was successfully cleared.'));
    }
}
