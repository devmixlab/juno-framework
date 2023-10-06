<?php

//use Core\Facade\Facade;
use Juno\Facade\Facade;

//dd(Facade::$default_facades);

/*
 * App main config file
 */
return [

  'auth' => [
    'providers' => [
      'usrs' => [
        'name' => 'usrs',
        'model' => \App\Models\Usr::class,
      ],
    ],
  ],

  /*
   * All facade register here
   */
  'facade_aliases' => array_merge(Facade::$default_facades, [
//    'App' => Core\App\AppFacade::class,
//    'Router' => Core\Router\RouterFacade::class,
//    'Str' => core\helpers\StrFacade::class,
//    'Arr' => core\helpers\ArrFacade::class,
//    'Url' => core\helpers\UrlFacade::class,
    // 'View' => core\view\ViewFacade::class,
//    'Blade' => core\view\BladeFacade::class,
//    'Breadcrumbs' => core\breadcrumbs\BreadcrumbsFacade::class,
//    'Request' => Core\Request\RequestFacade::class,
//    'IlluminateRequest' => core\request\IlluminateRequestFacade::class,
    // 'Redirect' => core\redirect\RedirectFacade::class,
    // 'Response' => core\facades\ResponseFacade::class,
//    'Validator' => core\validator\ValidatorFacade::class,
//    'Session' => core\session\SessionFacade::class,
//    'Cookie' => core\cookie\CookieFacade::class,
//    'Storage' => core\storage\StorageFacade::class,
//    'PublicStorage' => core\publicStorage\StorageFacade::class,
    // 'View' => core\facades\SmartyFacade::class,
    'Auth' => \Juno\Facades\Auth::class,
    'Hash' => \Juno\Facades\Hash::class,
    'Csrf' => \Juno\Facades\Csrf::class,
    // 'DB' => core\facades\DBFacade::class,
    // 'Event' => core\facades\EventFacade::class,
    // 'Breadcrumbs' => core\facades\BreadcrumbsFacade::class,
    // 'Log' => core\facades\LogFacade::class,

    //App facades
//    'File' => app\elements\file\FileFacade::class,
//    'Token' => app\elements\token\TokenFacade::class,
//    'Hardcoded' => app\elements\hardcoded\HardcodedFacade::class,
//    'Mapper' => app\elements\mapper\MapperFacade::class,
//    'Aliases' => app\elements\aliases\AliasesFacade::class,
//    'MModal' => app\elements\mmodal\MModalFacade::class,
//    'QrCode' => app\elements\qrCode\QrCodeFacade::class,
//    'QrCode2' => app\elements\qrCode2\QrCodeFacade::class,
//    'Date' => app\elements\date\DateFacade::class,
//    'WebSocket' => app\elements\webSocket\WebSocketFacade::class,
//    'Device' => app\elements\device\DeviceFacade::class,
//    'Document' => app\elements\document\DocumentFacade::class,
  ]),

];