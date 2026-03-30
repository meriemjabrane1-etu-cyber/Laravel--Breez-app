<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        // if ($user && $user->role == "organizer") {
        //     return $next($request);
        // }
        // return abort(403, "sir b7alek");
        if (!$user) {
            return redirect('/login');
        }

        if ($user->role !== 'organizer') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
