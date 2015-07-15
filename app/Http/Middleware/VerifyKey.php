<?php

namespace App\Http\Middleware;

use Closure;
use Session;

use App\User;

class VerifyKey
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
        $key = $request->headers->get('X-Key');

        foreach(User::all() as $user)
        {
            if ($user->validateKey($key)) {
                Session::put('user', $user);
                return $next($request);
            }
        }

        return abort(401);
    }
}
