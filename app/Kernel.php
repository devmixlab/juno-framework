<?php
namespace App;

use Juno\Kernel as MainKernel;

class Kernel extends MainKernel{

  static protected $app_service_providers = [
    \App\ServiceProviders\AppServiceProvider::class,
  ];

  protected array $middleware_groups = [
    'web' => [
      \Juno\Middleware\ClearFlashSessions::class,
    ],
  ];

  static protected $app_middleware = [
    'custom' => \App\Middleware\Custom::class,
    'redirect_to_dash_if_auth' => \App\Middleware\RedirectToDashIfAuth::class,
    'redirect_if_not_dash_auth' => \App\Middleware\RedirectIfNotDashAuth::class,
  ];

}