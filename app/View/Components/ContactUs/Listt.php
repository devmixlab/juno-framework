<?php
namespace App\View\Components\ContactUs;

use Juno\View\Component;
use App\Models\ContactUs;

class Listt extends Component{

  protected array $messages = [];

  public function __construct(){
    $this->messages = ContactUs::all();
  }

  public function messages(){
    return $this->messages;
  }

}