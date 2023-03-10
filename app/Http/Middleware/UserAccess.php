<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $user_role): Response
  {
    if (auth()->user()->role !== $user_role) {
      return to_route('dashboard.index')->with('error', 'You do not have access to this page');
    }
    return $next($request);
  }
}
