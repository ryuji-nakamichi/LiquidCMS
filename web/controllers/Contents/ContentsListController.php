<?php

namespace Liqsyst\Controllers;

class ContentsListController {

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
    require_once "views/contents/index.php";
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

$contentsObj = new ContentsListController($routeMap);
$contentsObj->run();