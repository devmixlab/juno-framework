<?php
namespace Juno\Middleware;

use Juno\Request\Request;
use Juno\Response\Response;
use Juno\Middleware\Contracts\MiddlewareContract;
use Closure;
//use Juno\Facades\FlashSession;

class Custom implements MiddlewareContract{

  public function handle(Request $request, Closure $next) : Response
  {
    dd(11);

    return $next($request);
  }

}