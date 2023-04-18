<?php

namespace Liqsyst\controllers;

class FieldsController {

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
    require_once "views/field/create.php";
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

$homeObj = new FieldsController($routeMap);
$homeObj->run();