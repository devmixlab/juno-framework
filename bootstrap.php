<?php
include_once('vendor/autoload.php');

define("ROOT_PATH", dirname(__FILE__) . DIRECTORY_SEPARATOR);
define("APP_PATH", ROOT_PATH . 'app' . DIRECTORY_SEPARATOR);
define("CONTROLLERS_PATH", APP_PATH . 'Controllers' . DIRECTORY_SEPARATOR);
define("PUBLIC_PATH", ROOT_PATH . 'public' . DIRECTORY_SEPARATOR);
//define("CORE_PATH", ROOT_PATH . 'core' . DIRECTORY_SEPARATOR);
define("CONFIG_PATH", ROOT_PATH . 'config' . DIRECTORY_SEPARATOR);
//define("LANG_PATH", ROOT_PATH . 'lang' . DIRECTORY_SEPARATOR);
//define("MIGRATIONS_PATH", ROOT_PATH . 'migrations' . DIRECTORY_SEPARATOR);
//define("STORAGE_PATH", ROOT_PATH . 'storage' . DIRECTORY_SEPARATOR);
//define("PUBLIC_STORAGE_PATH", PUBLIC_PATH . 'storage' . DIRECTORY_SEPARATOR);
//define("CORE_HELPERS_PATH", CORE_PATH . 'helpers' . DIRECTORY_SEPARATOR);
define("ROUTER_PATH", ROOT_PATH . 'router' . DIRECTORY_SEPARATOR);
define("RESOURCES_PATH", ROOT_PATH . 'resources' . DIRECTORY_SEPARATOR);
define("VIEWS_PATH", RESOURCES_PATH . 'views' . DIRECTORY_SEPARATOR);
//define("BLADE_VIEWS_PATH", VIEWS_PATH . 'blade' . DIRECTORY_SEPARATOR);
//define("BLADE_VIEWS_CACHE_PATH", VIEWS_PATH . 'blade_cache' . DIRECTORY_SEPARATOR);

$app_config = require(CONFIG_PATH . 'app.php');
spl_autoload_register(function ($class) use ($app_config) {
//  dd($class);
  if(in_array($class, array_keys($app_config['facade_aliases']))){
    $classCalled = $class;
    $class = $app_config['facade_aliases'][$class];
    class_alias($class, $classCalled);
  }

  $class = ltrim($class, '\\');
  $file = ROOT_PATH . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

//  dump($file);
//  dd(file_exists($file));

  if(file_exists($file) !== false)
    require_once $file;
});
unset($app_config);

//require_once(CORE_PATH . 'helpers.php');

//dd(111);

$app = new Juno\App\Application();

//dd(111);

//$app->set('app', $app);

//dd(11);
//\App::test();
//\App::test();

//\Router::test();

//$app->singleton('router', fn() => new \Core\Router\Router());

//\Router::get('/', function(){
//  dd('home');
//})->name('home');
//
//\Router::get('/', function(){
//  dd('home');
//})->name('home');

//$app->set(\Core\Router\Router::class, fn () => new \Core\Router\Router());

//\Router::get('/', function(){
//  dd('home');
//})->name('home');
//
//\Router::get('/', function(){
//  dd('home');
//})->name('home');

//use Core\Kernel;

//$app->get('fsdf');
//$kernel = $app->get(Kernel::class);

//dd('end');