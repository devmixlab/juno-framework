<?php
namespace App\Controllers;

use Juno\Request\Request;
use App\Models\Post;
//use Juno\Framework\Test;
use Juno\Dotenv\Dotenv;
use Juno\Database\DB;

//use App\Controllers\TestController;
class ContactUsController {

  public function index()
  {
//    throw new \Juno\Exceptions\ViewException("Wrong content");

//    dd(11);
//    dump('ContactUsController@index');
    return view('contact_us.index');
  }

}