<?php

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\RedirectResponse;

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            if ($this->auth->user()->is_admin === true) {
                return $next($request);
            }
        }

        return new RedirectResponse(url('/'));
    }
}
