<?php

namespace App\Domains\Logic\Http\Requests\Frontend\Auth;

use App\Domains\Auth\Rules\UnusedPassword;
use App\Domains\Logic\Rules\UnusedPassword as RulesUnusedPassword;
use Illuminate\Foundation\Http\FormRequest;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

/**
 * Class UpdatePasswordRequest.
 */
class UpdatePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => ['required', 'max:100'],
            'password' => array_merge(
                [
                    'max:100',
                    new RulesUnusedPassword($this->user()),
                ],
                PasswordRules::changePassword(
                    $this->email,
                    config('boilerplate.access.user.password_history') ? 'current_password' : null
                )
            ),
        ];
    }
}
