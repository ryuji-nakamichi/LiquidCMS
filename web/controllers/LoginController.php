<?php

namespace Liqsyst\Controllers;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_LIB_PATH . 'Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once('controllers/BaseController.php');

class LoginController extends BaseController {

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
  public function show(): void {
    $routeMap = $this->routeMap;
    
    // $_SESSION['user'] = array();
    $UtilityObj = new Utility();
    $flg = $UtilityObj->isLogin();
    if (!$flg) {
      require_once "views/login/index.php";
    } else {
      header('Location: /');
      exit();
    }
  }

    
  /**
   * viewファイルレンダリング実行
   *
   * @return void
   */
  public function run(): void {
    $this->show();
  }
}

$loginObj = new LoginController($routeMap);
$loginObj->run();