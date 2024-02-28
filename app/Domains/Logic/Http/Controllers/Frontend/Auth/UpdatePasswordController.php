<?php

namespace App\Domains\Logic\Http\Controllers\Frontend\Auth;

use App\Domains\Logic\Http\Requests\Backend\User\UpdateUserPasswordRequest;
use App\Domains\Logic\Services\UserService;

/**
 * Class UpdatePasswordController.
 */
class UpdatePasswordController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * ChangePasswordController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param  UpdatePasswordRequest  $request
     * @return mixed
     *
     * @throws \Throwable
     */
    public function update(UpdateUserPasswordRequest $request)
    {
        $this->userService->updatePassword($request->user(), $request->validated());

        return redirect()->route('frontend.user.account', ['#password'])->withFlashSuccess(__('Password successfully updated.'));
    }
}
