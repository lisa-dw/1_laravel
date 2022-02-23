<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    // api용 리다이렉트(Redirect)를 설정하고 401 에러를 응답(Response)하도록 설정
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson())
        {
            if($request->is('api/users/'))
//            {
//                return route('api.jwt.unauthorized');
//            }
            return route('login');
        }
    }
}
