<?php

class Menu{

  public function getMenu(){
      $db = ORM::forTable('pages')
          ->select('url')
          ->select('title')
          ->where('active', 1)
          ->orderByAsc('menu_order')
          ->findArray();

    $html = '<div class="menu-wrap"><nav class="menu navbar"><div class="icon-list navbar-collapse"><ul class="navbar-nav">{{lista}}</ul></div></nav><button class="close-button" id="close-button"><i class="lnr lnr-cross"></i></button></div>';

    $lista = '';
    foreach($db as $item){
      $lista .= $this->makeItem($item['url'], $item['title']);
    }

    return str_replace('{{lista}}', $lista, $html);
  }

  private function makeItem($url, $title){
    return '<li class="nav-item"><a class="nav-link" href=".'.$url.'">'.$title.'</a></li>';
  }

}