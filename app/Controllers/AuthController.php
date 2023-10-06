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

class AuthController {

  public function logout()
  {
//    dd(1212);
    \Auth::provider('usrs')->logout();
    return redirect()->route('login');
  }

  public function login()
  {
//    $provider = \Auth::provider('usrs');
//    $res = $provider->attempt('roli19850923@gmail.com', '123');

//    dd($res);

//    $user = \Auth::provider('usrs')->user();
//    dd($user->email);
//    dd(\App::config('app', []));
    return view('auth.login');
  }

  public function passLogin(Request $request)
  {
    $res = Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required',
    ]);

    if(!$res->valid())
      return redirect()->back($res);

    $validated = $res->validated();
    $is_auth = \Auth::provider('usrs')->attempt($validated['email'], $validated['password']);

    if($is_auth){
      return redirect()->route('dash.main');
    }else{
      return redirect()->back($res)->withMessage('Wrong password or login.');
    }
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

//    $validated = collect($res->validated());
    $data = $res->validated(true)->except('confirm_password')->all();
//    dd($data);

    $model = new Usr($data);
    $model->password = \Hash::make($model->password);
    $model->save();

//    dd($model);
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