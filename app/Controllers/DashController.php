<?php
namespace App\Controllers;

use Juno\Database\Model;
use Juno\Request\Request;
use App\Models\Post;
//use Juno\Framework\Test;
use Juno\Dotenv\Dotenv;
use Juno\Database\DB;
use Juno\Facades\Validator;
use App\Models\ContactUs;
use Auth;
use App\Models\Usr;

class DashController {

  public function main()
  {
    return view('dash.main');
  }

}