<?php


namespace Liqsyst\Utility;


/**
  * 汎用的Class
  *  
  */
class RouteClass {

  // プロパティ
  public $path;
  public $url;
  public $route;

  // コンストラクタ関数
  function __construct($url) {
    // それぞれのプロパティに対して格納する
    // $this->url、つまりpublic $urlに引数の$urlを代入するという意味
    $this->url = $url;
  }


   /**
  * ルーティング関数
  *  
  * @return array ルーティングの結果配列
  */
  public function routing () {

    

  }


  /**
  * ルーティング関数
  *  
  * @return array ルーティングの結果配列
  */
  public function routingUrl () {

    if (false !== strpos($this->url, '/')) {
      $this->path = explode("/", $this->url);
    }

    // ルート情報を初期化
    $this->route['route'] = [
      'name' => '',
      'controller' => '',
      'params' => '',
    ];

    // URLによりルート情報を分岐格納する
    if (isset($this->path[1])) {
      if ($this->path[1] === '') {
        $this->route['route'] = [
          'name' => 'home',
          'controller' => 'HomeController',
          'params' => 'test',
        ];
      } else if ($this->path[1] === 'contents/:page') {
        $this->route['route'] = [
          'name' => 'contents',
          'controller' => 'ContentsController',
          'params' => 'contents-test',
        ];
      } else {
        $this->route['route'] = [
          'name' => '404',
          'controller' => 'NotFoundController',
          'params' => '404-test',
        ];
      }
    }

    return $this->route;

  }


  /**
  * ルーティング情報を元にコントローラーファイルを読み込む
  *  
  * @param array $route ルーティング情報配列
  */
  public function contollerExe ($route) {
    $_route = $route;

    if ($_route['route']['controller']) {
      require_once('controllers/' . $_route['route']['controller'] . '.' . 'php');
    }
  }
}

