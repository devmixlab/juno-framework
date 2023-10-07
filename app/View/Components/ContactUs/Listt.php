<?php
namespace App\View\Components\ContactUs;

use Juno\View\Component;
use App\Models\ContactUs;
use Juno\Collection\Collection;

class Listt extends Component{

  protected Collection $messages;

  public function __construct(){
//    dd(111);
    $messages = ContactUs::all();
//    $messages = ContactUs::find(1);
//    dd($messages);
    $this->messages = $messages;
  }

  public function messages(){
    return $this->messages;
  }

}