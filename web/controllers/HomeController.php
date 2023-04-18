<?php

namespace Liqsyst\Controllers;

require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as Base;

class HomeController extends Base {

  // プロパティ
  public $routeMap = '';


  /**
   * __construct
   *
   */
  function __construct($routeMap) {
    parent::__construct($routeMap);
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function show() {
    $routeMap = $this->routeMap;
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

$homeObj = new HomeController($routeMap);
$homeObj->run();