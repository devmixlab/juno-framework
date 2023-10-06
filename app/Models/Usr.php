<?php
namespace App\Models;

use Juno\Database\Model;

class Usr extends Model{

  protected $table = 'usrs';

  protected $hidden = ['password'];

//  public function save() : bool
//  {
//    dd($this->getPublicVars());
//  }

//  public function getPublicVars()
//  {
//    return get_object_vars(...)->__invoke($this);
//  }

}