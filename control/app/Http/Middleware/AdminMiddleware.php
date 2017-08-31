<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class AdminMiddleware
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
        if (Sentinel::check()){
            $slug = Sentinel::getUser()->roles()->first()->slug ;
            if ($slug == 'admin' || $slug == 'admin2' || $slug == 'administrator' ){
                $action =  $request->route()->getName();
                if (!Sentinel::hasAccess(trim($action)))
                {
                    return redirect('/')->withErrors('Permission denied.');
                }
                return $next($request);
            }else {
                return redirect('/');
            }
        }else {
            return redirect()->guest('/userLogin');
        }
    }
}
