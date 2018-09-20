<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (($user && $user->hasRole('webmaster')) || ($user && $user->hasRole('admin')))
        {
            return $next($request);
        }

        return redirect('/home');
    }
}
