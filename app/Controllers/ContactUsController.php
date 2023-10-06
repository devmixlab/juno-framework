<?php
namespace App\Controllers;

use Juno\Request\Request;
use App\Models\Post;
//use Juno\Framework\Test;
use Juno\Dotenv\Dotenv;
use Juno\Database\DB;
use Juno\Facades\Validator;
use App\Models\ContactUs;

//use App\Controllers\TestController;
class ContactUsController {

  public function index()
  {
    if(!flash_session()->isEmpty()) {
//      dump(old('message'));
//      dump(flash_session()->all());
    }

//    if(flash_session()->has('errors')) {
//      dump(flash_session()->get('errors'));
//    }
//    throw new \Juno\Exceptions\ViewException("Wrong content");

//    dd(11);
//    dump('ContactUsController@index');
//    $contact_us = ContactUs::all();
//    dd($model);
    return view('contact_us.index', [
//      "contact_us" => $contact_us,
    ]);
  }

  public function store(Request $request)
  {
    $res = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'string|nullable',
    ]);

    if(!$res->valid())
      return redirect()->back($res);

    $model = new ContactUs($res->validated());

    $model->save();
    return redirect()->back();
//    dd($model);
//    dd($res->validated());

//    dd($request->all());
//    dump('ContactUsController@index');
//    return view('contact_us.index');
  }

}