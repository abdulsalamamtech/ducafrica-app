<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $role): Response
    {

        // $roles = "user|admin|group-head";
        $rolesArray = explode('|', $role);
        // dd($role, $rolesArray);
        $userRoles = [request()->user()?->role->label(), request()->user()?->activeRole()];
        // dd($userRoles);
        
        foreach($rolesArray as $checkRole){
            if(in_array($checkRole, $userRoles)
            ){
                return $next($request);
            }
        }
        
        
        return redirect()->back()->with('error', 'You are not authorized!');
        // if ($post->status === PostStatus::DRAFT){}
        // dd($request->user()->roles->contains('name', $role));
        // dd($request->user()->roles);

    }
}
