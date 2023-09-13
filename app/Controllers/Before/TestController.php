<?php
namespace App\Controllers\Before;

use Juno\Request\Request;
//use Juno\Framework\Test;

//use App\Controllers\TestController;
class TestController {
//  function __construct(){
//    echo 'dsdd';
//    die();
//  }

  public function test(Request $request, $name, $age = null)
//  public function test($name, $age = null)
  {

    dump($request->getMethod());
    dump($name);
    dump($age);
//    dump($request);
    dump('TestController@testddas');

    return 99999;
  }

  public function big(Request $request)
//  public function test($name, $age = null)
  {

//    dump($request->getMethod());
//    dump($name);
//    dump($age);
//    dump($request);
    dump('TestController@big');

    return 99999;
  }

}