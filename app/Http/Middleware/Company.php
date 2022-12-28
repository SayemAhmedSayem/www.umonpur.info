<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Response;

class Company {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $user      = Auth::user();
        $user_type = $user->user_type;

        if ($user_type == 'user' || $user_type == 'staff') {
            $route_name = \Request::route()->getName();

            /** If User Type = Staff **/
            if ($route_name != '' && $user_type != 'user') {

                if (explode(".", $route_name)[1] == "update") {
                    $route_name = explode(".", $route_name)[0] . ".edit";
                } else if (explode(".", $route_name)[1] == "store") {
                    $route_name = explode(".", $route_name)[0] . ".create";
                }
                if (!has_permission($route_name)) {
                    if (!$request->ajax()) {
                        return redirect()->back()->with('noaccess', 'Access Denied, You Don’t Have Permission');
                    } else {
                        return redirect()->back()->with('noaccess', 'Access Denied, You Don’t Have Permission');
                    }
                }
                
            }

        } else {
            if (!$request->ajax()) {
                return redirect()->back()->with('noaccess', 'Access Denied, You Don’t Have Permission');
            } else {
                return redirect()->back()->with('noaccess', 'Access Denied, You Don’t Have Permission');
            }
        }
        
        if(Auth::user()->status=='0'){
            return redirect()->back()->with('noaccess', 'Your Account is not active');
        }
    

        return $next($request);
    }
}
