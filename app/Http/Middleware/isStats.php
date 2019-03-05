<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use App\User;

use Closure;

class isStats
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->header('ID_USER');
        $user = User::where('id', $id)->first();   

        $user->authorizeRoles('doc_module_stats');
      
        return $next($request);
        // abort(403, 'This action is unauthorized');
    }
}
