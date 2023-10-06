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

class AuthController {

  public function login()
  {
    return view('auth.login');
  }

  public function storeLogin()
  {
//    return view('auth.login');
  }

  public function register()
  {
    return view('auth.register');
  }

  public function storeRegister(Request $request)
  {
//    dd(\Hash::make(323));

    $res = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'age' => 'required|integer',
      'gender' => 'required|string|in:male,female',
      'password' => 'required',
      'confirm_password' => 'required|same:password',
    ]);

//    dd($res->data());

    if(!$res->valid())
      return redirect()->back($res);

//    dd(1212);
//    $model = new ContactUs($res->validated());

//    $model->save();
    return redirect()->back();
  }

//  public function store(Request $request)
//  {
//    $res = Validator::make($request->all(), [
//      'name' => 'required',
//      'email' => 'required|email',
//      'message' => 'string|nullable',
//    ]);
//
//    if(!$res->valid())
//      return redirect()->back($res);
//
//    $model = new ContactUs($res->validated());
//
//    $model->save();
//    return redirect()->back();
////    dd($model);
////    dd($res->validated());
//
////    dd($request->all());
////    dump('ContactUsController@index');
////    return view('contact_us.index');
//  }

}