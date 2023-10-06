<?php
namespace App\Middleware;

use Juno\Request\Request;
use Juno\Response\Response;
use Juno\Middleware\Contracts\MiddlewareContract;
use Closure;

class RedirectToDashIfAuth implements MiddlewareContract{

  public function handle(Request $request, Closure $next) : Response
  {
    if(\Auth::provider('usrs')->isAuth())
      return redirect()->route('dash.main')->makeResponse();

    return $next($request);
  }

}