<?php

namespace App\Domains\Logic\Http\Middleware;

use App\Domains\Logic\Models\User;
use Closure;

/**
 * Class AdminCheck.
 */
class AdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->isType(User::TYPE_ADMIN)) {
            return $next($request);
        }

        return redirect()->route('frontend.index')->withFlashDanger(__('You do not have access to do that.'));
    }
}
