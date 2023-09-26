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
      return $idx % 2 == 0 ? strtoupper($itm) : $itm;
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
    $arr_keys = [1,1,3,5,6];

    $coll = new Collection($arr_keys);
    $res = $coll->count();

    dd($res);
  }

  public function countBy()
  {
    $arr_keys = [['name' => "Ben"],['name' => "Ben"],3,5, true];

    $coll = new Collection($arr_keys);
    $res = $coll->countBy(function($itm){
      if(is_array($itm) && !empty($itm['name']) && $itm['name'] == 'Ben')
        return 'arr';
    });

    dd($res);
  }

  public function dot()
  {
    $arr_keys = [['name' => "Ben", "age" => 30],['name' => "Ben", "age" => 44, [1,4,7]],3,5, true];
//    $arr_keys = [['name' => "Ben", "age" => 30]];

    $coll = new Collection($arr_keys);
    $res = $coll->dot();

//    $res->dd();
    return $res->all();
  }

  public function each()
  {
    $arr_keys = [['name' => "Ben", "age" => 30],['name' => "Ben", "age" => 44, [1,4,7]],3,5, true];
//    $arr_keys = [['name' => "Ben", "age" => 30]];

    $coll = new Collection($arr_keys);
    $coll->each(function($itm, $key){
      if($key == 1)
        return false;

      dump($itm);
    });

    dd(1);
  }

  public function ensure()
  {
//    $arr_keys = [1,2,3,4];
    $arr_keys = [new Collection([1,2]),new Collection([1,2])];
//    $arr_keys = [['name' => "Ben", "age" => 30]];

//    $coll = new Collection($arr_keys);
//    $res = $coll->ensure(Collection::class);

    $res = \Arr::ensure($arr_keys, [Collection::class, 'int', 'array']);

    dd($res);
  }

  public function every()
  {
    $arr_keys = [1,2,3,4, '3'];
//    $arr_keys = [['name' => "Ben", "age" => 30]];

    $coll = new Collection($arr_keys);
    $res = $coll->every(function($itm, $key){
      return is_numeric($itm);
    });

    dd($res);
  }

  public function filter()
  {
    $arr_keys = [1,2,3,4, [2]];
//    $arr_keys = [['name' => "Ben", "age" => 30]];

    $coll = new Collection($arr_keys);
    $res = $coll->filter(function($itm, $key){
//      return true;
      return is_array($itm);
    });

    dd($res);
  }

  public function except()
  {
    $arr_keys = [1,2,3,4, [2]];
////    $arr_keys = [['name' => "Ben", "age" => 30]];
//
    $coll = new Collection($arr_keys);
    $res = $coll->except([0,4]);
//
    dd($res);
  }

  public function only()
  {
    $arr_keys = [1,2,3,4, [2]];
////    $arr_keys = [['name' => "Ben", "age" => 30]];
//
    $coll = new Collection($arr_keys);
    $res = $coll->only(4);
//
    dd($res);
  }

  public function first()
  {
    $arr_keys = [true,1,2,3,'tt',4, [2]];
////    $arr_keys = [['name' => "Ben", "age" => 30]];
//
    $coll = new Collection($arr_keys);
//    $res = $coll->first(function($itm, $key){
//      return !is_numeric($itm);
//    });
    $res = $coll->first();
//
    dd($res);
  }

  public function firstWhere()
  {
    $arr_keys = [
      ['name' => "Ben"],
      ['name' => "Jonny"],
      ['name' => "Martin"],
    ];
//
    $coll = new Collection($arr_keys);
    $res = $coll->firstWhere('age');
//
    dd($res);
  }

  public function flatMap()
  {
    $collection = new Collection([
      ['name' => 'Sally'],
      ['school' => 'Arkansas'],
      ['age' => 28]
    ]);

    $flattened = $collection->flatMap(function (array $values) {
      return array_map('strtoupper', $values);
    });

    $flattened->dd();
  }

  public function flatten()
  {
    $collection = new Collection([
      'name' => 'taylor',
      'languages' => [
        'php', 'javascript', [1,2]
      ]
    ]);

    $flattened = $collection->flatten(2);

//    dd()
    $flattened->dd();
  }

  public function forget()
  {
    $collection = new Collection(['name' => 'taylor', 'framework' => 'laravel']);

    $collection->forget(['framework','name']);

    $collection->dd();
  }

  public function get()
  {
    $collection = new Collection(['name' => 'taylor', 'framework' => 'laravel']);

    $value = $collection->get('name', function(){
      return 222 * 4;
    });

    dd($value);
  }

  public function groupBy()
  {
    $collection = new Collection([
      10 => ['user' => 1, 'skill' => 1, 'owner' => 'my', 'roles' => ['Role_1', 'Role_3']],
      20 => ['user' => 2, 'skill' => 1, 'owner' => 'my', 'roles' => ['Role_1', 'Role_2']],
      30 => ['user' => 3, 'skill' => 3, 'owner' => 'my', 'roles' => ['Role_1']],
      40 => ['user' => 4, 'skill' => 3, 'owner' => 'my', 'roles' => ['Role_2']],
      43 => ['user' => 43, 'owner' => 'some', 'roles' => ['Role_2']],
    ]);

//    $result = $collection->groupBy(['owner'], preserveKeys: true);

    $result = $collection->groupBy(['skill', function (array $item) {
      return $item['roles'];
    }], preserveKeys: true);

//    $grouped = $collection->groupBy('account_id');

    $result->dd();
  }

  public function has()
  {
    $collection = new Collection(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);

    $res = $collection->has(['amount', 'price']);

    dd($res);
  }

  public function hasAny()
  {
    $collection = new Collection(['account_id' => 1, 'product' => 'Desk', 'amount' => 5]);

    $res = $collection->hasAny(['product', 'price']);

    dd($res);
  }

  public function join()
  {
//    $res = (new Collection(['a', 'b', 'c']))->join(', '); // 'a, b, c'
//    $res = (new Collection(['a', 'b', 'c']))->join(', ', ', and '); // 'a, b, and c'
//    $res = (new Collection(['a', 'b']))->join(', ', ' and '); // 'a and b'
//    $res = (new Collection(['a']))->join(', ', ' and '); // 'a'
    $res = (new Collection([]))->join(', ', ' and '); // ''

    dd($res);
  }

  public function keyBy()
  {
    $collection = new Collection([
      ['product_id' => 'prod-100', 'name' => 'Desk'],
      ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $keyed = $collection->keyBy(function (array $item, int $key) {
      return strtoupper($item['product_id']);
    });
//    $keyed = $collection->keyBy('product_id');

    $keyed->dd();
  }

  public function keys()
  {
    $collection = new Collection([
      'prod-100' => ['product_id' => 'prod-100', 'name' => 'Desk'],
      'prod-200' => ['product_id' => 'prod-200', 'name' => 'Chair'],
    ]);

    $res = $collection->keys();
//    $keyed = $collection->keyBy('product_id');

    dd($res);
  }

  public function last()
  {
    $collection = new Collection([1, 2, 3, 4]);

    $res = $collection->last(function (int $value, int $key) {
//      dump($key);
      return $value < 3;
    });

    dd($res);
  }

  public function mapInto()
  {
    $collection = new Collection([[1], [2,34], [2,4,6]]);

    $n = $collection->mapInto(Collection::class);

    $n->dd();
  }

}