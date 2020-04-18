<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Api\ApiController;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Auth;
use App\Models\Role;

class RoleMiddleware extends ApiController
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('-',$role);

        foreach ($roles as $role)
        {
            if (Auth::user()->hasRole($role))
            {
                return $next($request);
            }

        }


        return $this->respondAccessDenied();
    }
}