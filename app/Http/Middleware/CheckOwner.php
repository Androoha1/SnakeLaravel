<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOwner
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user is the owner of the resource
        if ($request->user()->id !== $request->route('user')->id) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
