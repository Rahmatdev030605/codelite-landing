<?php

namespace App\Domains\Logic\Http\Controllers\Backend\User;

use App\Domains\Logic\Models\User;
use App\Domains\Logic\Services\UserService;
use Illuminate\Http\Request;

/**
 * Class UserStatusController.
 */
class DeactivatedUserController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * DeactivatedUserController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.auth.user.deactivated');
    }

    /**
     * @param  Request  $request
     * @param  User  $user
     * @param $status
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     */
    public function update(Request $request, User $user, $status)
    {
        $this->userService->mark($user, (int) $status);

        $redirectRoute = (int) $status === 1 || !$request->user()->can('admin.access.user.reactivate')
            ? 'admin.auth.user.index'
            : 'admin.auth.user.deactivated';

        return redirect()->route($redirectRoute)->withFlashSuccess(__('The user was successfully updated.'));
    }
}
