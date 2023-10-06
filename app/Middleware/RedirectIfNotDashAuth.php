<?php
namespace App\Middleware;

use Juno\Request\Request;
use Juno\Response\Response;
use Juno\Middleware\Contracts\MiddlewareContract;
use Closure;

class RedirectIfNotDashAuth implements MiddlewareContract{

  public function handle(Request $request, Closure $next) : Response
  {
    if(!\Auth::provider('usrs')->isAuth())
      return redirect()->route('login')->makeResponse();

    return $next($request);
  }

}