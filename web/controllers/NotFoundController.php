<?php

class NotFoundController {

  // プロパティ
  public $data = '';


  /**
   * __construct
   *
   */
  function __construct() {
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function show() {
    $data = $this->data;
    require_once "views/404/index.html";
  }

    
  /**
   * viewファイルレンダリング実行
   *
   * @return void
   */
  public function run() {
    $this->show();
  }
}

$homeObj = new NotFoundController();
$homeObj->run();