<?php
namespace App\Controllers;

use Juno\Request\Request;
use App\Models\Post;
use Juno\Dotenv\Dotenv;
use Juno\Database\DB;

use Juno\Collection\Collection;

//use App\Controllers\TestController;
class CollectionTestController {

  protected $test_arr = [
    'test' => [
      'one' => 'one',
      'three' => 'three',
      'four' => 'four',
      'five' => 'five',
      'six' => 'six',
    ],
    'new' => [1,2,3,4,5,9],
    'is_active' => true,
    'is_important' => false,
    "people" => [
      [
        "name" => "Billy",
        "gender" => "male",
        "age" => 20,
        "profession" => "construction"
      ],
      [
        "name" => "John",
        "gender" => "male",
        "age" => 30,
        "profession" => "medicine"
      ],
      [
        "name" => "Viktoria",
        "gender" => "female",
        "age" => 40,
        "profession" => "sales"
      ],
      [
        "name" => "Ben",
        "gender" => "male",
        "age" => 33,
        "profession" => "sport"
      ],
    ]
  ];

  public function index()
  {
    return 'CollectionTestController@index';
//    dump('CollectionTestController@index');
  }

  public function map()
  {
    $arr = ['one','two','three','four'];
    $coll = new Collection($arr);
    $res = $coll->map(function($itm, $idx){
      return $idx % 2 != 0 ? strtoupper($itm) : $itm;
    });

//    return $coll->all();
    return $res->all();
  }

  public function transform()
  {
    $arr = ['one','two','three','four'];
    $coll = new Collection($arr);
    $res = $coll->transform(function($itm, $idx){
      return $idx % 2 != 0 ? strtoupper($itm) : $itm;
    });

//    return $coll->all();
    return $res->all();
  }

  public function reject()
  {
    $arr = ['one','two','three','four'];
    $coll = new Collection($arr);
    $res = $coll->reject(function($itm, $idx){
      return in_array($itm, ['one','four']);
//      return false;
    });

//    return $coll->all();
    return $res->all();
  }

  public function avg()
  {
    $arr = [['num' => 100],4,1, ['num' => 10]];
    $coll = new Collection($arr);
    $res = $coll->avg('num');

//    return $coll->all();
    return $res;
  }

  public function chunk()
  {
    $arr = [['num' => 100],4,1, ['num' => 10]];
    $coll = new Collection($arr);
    $res = $coll->chunk(2);

//    dd($res);

    foreach($res as $v){
      dump($v);
    }

    dd(111);
//    return $coll->all();
    return $res->all();
  }

  public function collapse()
  {
    $arr = [
      [1, 2, ['one' => [1,3]]],
      [3, 5],
      [7, 8, 9],
      'fsdf',
    ];
    $coll = new Collection($arr);
    $res = $coll->collapse();

    return $res->all();
  }

  public function collect()
  {
    $arr = [
      [1, 2, ['one' => [1,3]]],
      [3, 5],
      [7, 8, 9],
      'fsdf',
    ];
    $coll = new Collection($arr);
    $res = $coll->collect();

    $ress = $coll->collapse();

//    return $ress->all();
    return $res->all();
  }

  public function combine()
  {
    $arr_keys = [
      'one', 'two', 'five', 'eight'
    ];

    $arr_vals = [
      '1', '2', '5', 77
    ];

    $coll = new Collection($arr_keys);
    $res = $coll->combine(new Collection($arr_vals));

//    dd($res);

    return $res->all();
  }

  public function concat()
  {
    $arr_keys = [
      'one', 'two', 'five'
    ];

    $arr_vals = [
      '1', '2', '5'
    ];

    $coll = new Collection($arr_keys);
    $res = $coll->concat(new Collection($arr_vals))
      ->concat(['eee']);

    return $res->all();
  }

  public function contains()
  {
    $arr_keys = [
      'one', 'two', 'five', 'my' => 'ten'
    ];

    $coll = new Collection($arr_keys);
    $res = $coll->contains(function($itm, $idx){
      if($itm == 'five' && $idx == 2)
        return true;
      return false;
    });

//    dd($res);

    return (string)$res;
  }

  public function doesntContain()
  {
    $arr_keys = [
      'one', 'two', 'five', 'my' => 'ten'
    ];

    $coll = new Collection($arr_keys);
    $res = $coll->doesntContain(function($itm, $idx){
      if($itm == 'five' && $idx == 2)
        return true;
      return false;
    });

    dd($res);

    return $res;
  }

  public function containsOneItem()
  {
    $arr_keys = [1,1];

    $coll = new Collection($arr_keys);
    $res = $coll->containsOneItem();

    dd($res);
  }

  public function count()
  {
    dd(111);
    $arr_keys = [1,1];

    $coll = new Collection($arr_keys);
    $res = $coll->count();

    dd($res);
  }

}