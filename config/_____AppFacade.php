<?php
namespace core\app;

use core\support\Facade;

class AppFacade extends Facade{

  public static function getInstance(){
    return App::getInstance();
  }

}