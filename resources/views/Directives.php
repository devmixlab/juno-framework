<?php
namespace Juno\View;

//use DOMDocument;
//use DOMXPath;
//use DOMElement;
//use Juno\Exceptions\AppException;
//use Juno\Exceptions\ViewException;

class Directives{

  protected $list = [];
  protected $patterns = [
    "push" => "/@push\((\'|\"){1}(([A-z])+)(\'|\"){1}\)(((?!@push|@endpush)[\s\S])+)@endpush/",
    "include" => "/@include\((\'|\"){1}(([A-z\.0-9_-])+)(\'|\"){1}(,(( |\n)*)?\[(((?!\]( |\n)?\))[\s\S])*)?\])?(( |\n)*)?\)/"
  ];

  public function stack(string $html): string {
    ["directives" => $directives, "html" => $html] = $this->getDirectives($html);
    $this->append($directives);
    return $html;
  }

  protected function append(array $directives)
  {
    if(empty($directives))
      return;

    foreach($directives as $k => $v){
      if(array_key_exists($k, $this->list) && is_array($this->list[$k])){
        $this->list[$k] = array_merge($this->list[$k], $v);
      }else{
        $this->list[$k] = $v;
      }
    }
  }

  public function getDirectives(string $html){
    $directives = [];

    $res = preg_match_all($this->patterns['push'], $html, $matches, PREG_SET_ORDER);
    if(!empty($res)){
      $html = preg_replace($this->patterns['push'],'', $html);
      $directives["push"] = $matches;
    }

    $res = preg_match_all($this->patterns['include'], $html, $matches, PREG_SET_ORDER);
//    dd($matches);
    if(!empty($res)){
//      $html = preg_replace($pattern,'', $html);
      $directives["include"] = $matches;
    }

//    dd($directives);

    return [
      "html" => $html,
      "directives" => $directives,
    ];
  }

}