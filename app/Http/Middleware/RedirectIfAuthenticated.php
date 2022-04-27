<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                /** @var User $user */
                $user = Auth::guard($guard);

                // to admin dashboard
                if($user->hasRole('is_admin')) {
                    return redirect(route('index'));
                }

                // to user dashboard
                else if($user->hasRole('user')) {
                    return redirect(route('index'));
                }
            }
        }

        return $next($request);
    }
}