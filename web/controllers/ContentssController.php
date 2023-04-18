<?php

namespace Liqsyst\Controllers;

class ContentssController {

  // プロパティ
  public $routeMap = '';


  /**
   * __construct
   *
   */
  function __construct($routeMap) {
    $this->routeMap = $routeMap;
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function showCreate() {
    $routeMap = $this->routeMap;
    require_once "views/contents/create.php";
  }

    
  /**
   * viewファイルレンダリング実行
   *
   * @return void
   */
  public function run() {
    $this->showCreate();
  }
}

$contentsObj = new ContentssController($routeMap);
$contentsObj->run();