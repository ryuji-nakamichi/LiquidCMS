<?php

class HomeController {

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
    require_once "views/dashboard/index.php";
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

$homeObj = new HomeController();
$homeObj->run();