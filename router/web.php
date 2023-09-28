<?php

use App\Controllers\TestController;
use Juno\Database\DB;
use Juno\Request\Request;
use Juno\Facades\Session;
use Juno\Facades\GlobalSession as GSession;
use Juno\Facades\AppSession as ASession;
use Juno\Facades\FlashSession as FSession;
use Juno\Facades\AuthSession as AuthSession;

use Juno\Facades\Validator;

use App\Models\Post;
use Juno\Facades\Input;
use Juno\Facades\Get;
use Juno\Facades\FlashSession;
use Juno\Facades\Cookie;

use Juno\Validating\Rules\Email;

use Juno\Collection\Collection;
use App\Controllers\CollectionTestController;
use App\Controllers\ContactUsController;


Router::get('/', function(Request $request){
//  FlashSession::push('ddd', 444);
//  dump(FlashSession::get('ddd'));
//    dump(route('test'));
//  $con = \App::config("auth.guards");
  return view('wel', [
    "varr" => "varr"
  ]);
})->name('home');

Router::prefix('/contact-us')->as('contact_us')->group(function() {

  Router::get('/', [ContactUsController::class, 'index'])->name('index');

});

Router::get('/test', function(Request $request){
//  FlashSession::push('ddd', 444);
//  dump(FlashSession::get('ddd'));
// dd(111);
  return view('welcome');
})->name('test');

Router::prefix('collection')->group(function(){

  Router::get('/', [CollectionTestController::class, 'index']);
  foreach([
    'map','transform','reject','avg','chunk','collapse','collect',
    'combine','concat','contains',
    'doesntContain' => 'doesnt-contain',
    'containsOneItem' => 'contains-one-item','count','countBy' => 'count-by',
    'dot','each','ensure','filter','every','except','only','first',
    'firstWhere' => 'first-where', 'flatMap' => 'flat-map', 'flatten',
    'forget','get','groupBy' => 'group-by', 'has', 'hasAny' => 'has-any',
    'join','keyBy' => 'key-by','keys','last','mapInto' => 'map-into'
  ] as $k => $pref)
    Router::get('/' . $pref, [CollectionTestController::class, (is_string($k) ? $k : $pref)]);

});

Router::get('/data/{id?}/{slug?}', function(Request $request, $id = null, $slug = null){

//  return '3123';
//  FlashSession::push('ddd', 444);
//  dump(FlashSession::get('ddd'));
//  return view('welcome');

//  dd($id);

//  res.set('Access-Control-Allow-Origin', 'http://localhost:8000');
  $collection = new Collection([
    [
      "id" => 1,
      "title" => [
        "rendered" => 'Post about food'
      ],
      "content" => ["rendered" => 'This is a content for food post'],
      "excerpt" => ["rendered" => 'excerpt'],
      "date" => "1988-03-23",
      "slug" => "post_about_food",
    ],
    [
      "id" => 2,
      "title" => ["rendered" => 'Post about cars'],
      "content" => ["rendered" => 'This is a content for car post'],
      "excerpt" => ["rendered" => 'excerpt'],
      "date" => "1984-03-23",
      "slug" => "post_about_cars",
    ],
    [
      "id" => 3,
      "title" => ["rendered" => 'Post about space'],
      "content" => ["rendered" => 'This is a content for space post'],
      "excerpt" => ["rendered" => 'excerpt'],
      "date" => "1990-03-23",
      "slug" => "post_about_space",
    ],
    [
      "id" => 4,
      "title" => ["rendered" => 'Post about TV'],
      "content" => ["rendered" => 'This is a content for TV post'],
      "excerpt" => ["rendered" => 'excerpt'],
      "date" => "1999-03-23",
      "slug" => "post_about_tv",
    ],
  ]);

  $response = response()->addHeader('Access-Control-Allow-Origin', 'http://localhost:4200');

//  if(!empty($id) && !empty($slug)){
  if(!empty($id)){
    $collection = $collection->filter(
      function($itm) use ($id, $slug) {
        return array_key_exists('id', $itm) && $itm['id'] == $id;

//        return array_key_exists('id', $itm) && $itm['id'] == $id &&
//          array_key_exists('slug', $itm) && $itm['slug'] == $slug;
//        return array_key_exists('id', $itm);
      }
//      $itm => array_key_exists('id', $itm) && $itm['id'] == $id
    );

    return $response->json($collection->first());

//    dd($id);
//    dd($collection);
//    dd($collection->first());
  }

  return $response->json($collection->toArray());

//  dd($res);

//  return [
//    'plane' => 5,
//    'ship' => 2,
//    "other" => 1
//  ];
});