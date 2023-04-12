<?php


namespace Liqsyst\Utility;


/**
  * 汎用的Class
  *  
  */
class UtilityClass {

  // プロパティ
  public $path;
  public $url;

  // コンストラクタ関数
  function __construct($url) {
    // それぞれのプロパティに対して格納する
    // $this->url、つまりpublic $urlに引数の$urlを代入するという意味
    $this->url = $url;
  }


  /**
  * ルーティング関数
  *  
  * @param array $input 検索条件
  * @return array ルーティングの結果配列
  */
  public function routingUrl () {

    if (isset($this->url)) {
      $this->path = explode("/",$this->url);
    }
    // echo '<pre>';
    // echo $path;
    // echo '</pre>';
    // echo '<pre>';
    // print_r($path);
    // echo '</pre>';

    switch ($this->path[1]) {
      case '': // TOP
        include "views/dashboard/index.html";
        break;

      case 'field': // field

        switch ($this->path[2]) {
          case 'create':
            include "views/field/create.html";
            break;
          
          default: // どの条件にも満たない場合
            include "views/404/index.html";
            break;
        }
        break;
      
      default: // どの条件にも満たない場合
        include "views/404/index.html";
        break;
    }

  }
}

