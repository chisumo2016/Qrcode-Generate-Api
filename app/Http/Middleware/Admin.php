<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

class Admin
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
        if (Auth::user()->role_id !=  2)
        {
            Flash::error('Sorry, you have no permission to view this');
            return redirect('/trasanctions');

        }
        return $next($request); // pass the request or contine
    }
    //suppose if you have role of list as it now.
    //and yo can have permissions like
    //create.users, edit.users, delete.users, update.users
    //and you will be able to assign permissions to role.
    //so that the user has role of 1 can do only the allowed things such as role 2

    // has permission to create only user but may not have permission to delete user.
}

