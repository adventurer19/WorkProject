<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;

class AdminMiddle
{

  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   *
   * @return mixed
   */
    public function handle(Request $request, Closure $next)
    {
        if (\Illuminate\Support\Facades\Gate::allows('is-admin')) {
            return $next($request);
        }
        return redirect('/');
      /// TODO
      // return redirect('/');
    }
}
