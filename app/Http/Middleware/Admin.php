<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class Admin {

    public function handle($request, Closure $next) {
        if(!Auth::user()->admin) {
            Session::flash('info', 'You do not have permission to this action');

            return  redirect()->back();
        }

        return $next($request);
    }
}
