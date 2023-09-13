<?php
namespace App\Controllers;

use Juno\Request\Request;
use App\Models\Post;
//use Juno\Framework\Test;
use Juno\Dotenv\Dotenv;
use Juno\Database\DB;

//use App\Controllers\TestController;
class TestController {
//  function __construct(){
//    echo 'dsdd';
//    die();
//  }

  public function index()
  {
    dump('TestController@index');
  }

  public function edit($id)
  {
    dd($id);
  }

  public function create()
  {
//    dd(1111);
//    $res = \Router::getUrlByRouteName();
    $res = \Router::getUrlByRouteName('small.edit', ['id' => '1']);
//    $res = \Router::getUrlByRouteName('small.edit');
//    $res = \Router::getUrlByRouteName('home');

//    dd(333);
    dd($res);
    return view('create', [
      'name' => 'Roman'
    ]);
//    echo $v;
//    die();
//    dd($v);
//    return response()->text('fsdfsdf');

    dd(response()->test());

//    dd(getenv('DB_USERNAME'));
//    dd(\App::has(Dotenv::class));
//    dd(\App::has(Dotenv::class));
//    $dotenv = \App::makeWith(Dotenv::class, [
//      'path' => 4321,
////      'request' => 444
//    ]);
//    \App::makeWith(Dotenv::class, [
//      'path' => 4321,
////      'request' => 444
//    ]);

//    $dotenv = \App::makeWith(Dotenv::class, [
//      'path' => 4444444,
////      'request' => 444
//    ]);

//    $dotenv = \App::make(Dotenv::class);
//    $dotenvv = \App::get(Dotenv::class, ['path' => 45555]);
////    $dotenv = \App::get(Dotenv::class);
//    dd($dotenv->path);
//    dd($dotenv);

//    $new = fn($path) => new Dotenv($path);

//    new \ReflectionMethod($class,'__construct');
//    $reflectionFunction = new \ReflectionFunction($new);
//    $reflectionFunction->invokeArgs(['path' => 424234]);

//    $posts = Post::where(['name' => 'dasd'])->orWhere(['name' => 'eeee'])->select('fdf');
//    $posts = Post::where(function($query){
//      $query->where('user_id', 3);
//    })->get();

//    $posts = Post::where(function($query){
//      $query->where('user_id', 3);
//    })->orWhere(['title' => '6PPf7NxD92'])->orderBy('id', 'desc')->orderBy('title')->groupBy('user_id','title');

//    $posts = Post::select('user_id, COUNT(*) as count')->where(function($query){
//      $query->where('user_id', 3)->orWhere(['user_id' => '2']);
//    })->groupBy('user_id');
//
//    $posts = Post::select('COUNT(*) as count')->where(function($query){
//      $query->where('user_id', 3)->orWhere(['user_id' => '2']);
//    });

//    $posts = Post::find(3);
//    $posts = Post::all();
    $posts = Post::alias('p')
      ->join('users u', 'p.user_id', '=', 'u.id')
      ->leftJoin('users u', 'p.user_id', '=', 'u.id')
      ->where('user_id', 2);


//
    dd($posts->sql());

//    dd(Post::where(['id', '!=', 17])->sql());

//    dd(Post::where(['id', '=', 2])->get());

//    $posts = Post::whereIn('`id`', [2,3,]);
//    dd($posts->sql());
//    dd($posts->get());

//    $posts = Post::orWhere(function($query){
//      $query->orWhere([
//        ['`id`', 321],
//        ['`id`', 3],
//      ])->where([
//        ['`id_2`', 321],
//        ['`id_2`', 3],
//      ]);
//    })->orWhere(function($query){
//      $query->where([
//        ['`id`', 321],
//        ['`id`', 3],
//      ])->where([
//        ['`id`', 321],
//        ['`id`', 3],
//      ]);
//    });

//    $posts = Post::where([
//      ['`id`', 321],
//    ])->where(function($query){
//      $query->whereIn(' `id`', [1,2,3]);
//    });
//    ->whereIn(' `id`', [1,2,3]);

//    $posts = Post::where(function($query){
//      $query->where([
//        ['`id`', 321],
//        ['`id`', 3],
//      ]);
//    });

    dd('ffff');
    dd($posts->sql());

//    dd(Post::where('id', 1)->update([
//      'user_id' => 1,
//      'title' => 'fsdf',
//    ]));

    dd(Post::where([
      ['user_id', 1],
      ['title', 'xChc1WIAsa']
    ])->orWhere('title', 'oALisqZhdg')->get());

    dd(Post::where('user_id', 1)->where(['title', '=', 'xChc1WIAsa'])->get());

    dd(Post::where('user_id', 2)->orWhere(['title', '=', 'xChc1WIAsa'])->get());

    dd(Post::all());

    DB::table('posts')->insert([
      [
        'title' => 'One',
        'content' => 'One content',
        'user_id' => 1,
      ],
      [
        'title' => 'Two',
        'content' => 'Two content',
        'user_id' => 2,
//        'user_idee' => 2,
      ]
    ]);

    dd(11);

//    $post = new Post([
//      'title' => 'One',
//      'content' => 'One content',
//      'user_id' => 1,
////      'user_idd' => 1
//    ]);

    $res = $post->save();

    dd($res);

    $posts = Post::alias('p')->select('p.title, u.name')
      ->leftJoin('users u', 'p.user_id', '=', 'u.id')
      ->crossJoin('users k', 'p.user_id', '=', 'k.id');

//    dd($posts->sql());

    dd($posts->get());


//    $posts = Post::where(function($query){
//      $query->where('user_id', 3);
//    })->get();

//    $posts = Post::where('title', '6PPf7NxD92')->orWhere(['title' => 'j4lk3MZUv8']);

//    $posts = Post::all();

//    dump($posts->sql());
//    dump($posts->getPdoArgs());

//    $posts = $posts->get();
//    $posts = $posts->first();

    dd($posts);

//    $post = new Post();
//    $post->user_id = 2;
//    $post->title = 'Title';
//    $post->content = 'Content';
//    $post->created_at = date('Y-m-d H:i:s', time());
//    $post->updated_at = date('Y-m-d H:i:s', time());

//    dd(111);
//    $post->save();

//    $route = \Router::getUrlByRouteName('small.edit', ['id' => 3332, 'search' => 32, 'ddd' => null]);
//    dump($route);
//    $arr = ['one' => ['two' => 32, 'five' => 444]];

//    $arr = [null, ['', 444], [545, 88], ''];
//    dump($arr);
//    dump(\Arr::removeWithEmptyValue($arr));
//    dump(\Arr::setByDotPattern($arr, '3', '10'));
//    dump(\Router::getCurrentRouteAction());
//    dump(\Router::isCurrentRoute('small.index'));
    dump('TestController@create');
  }

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