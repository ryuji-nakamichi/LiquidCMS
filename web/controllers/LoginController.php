<?php

namespace Liqsyst\Controllers;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

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
   * コンテンツ管理のViewデータ取得
   *
   * @return array $navView
   */
  private function setContentsNavView(): array {
    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $navView = $QueryObj->setContentsNavView(); // DBからコンテンツ管理のデータを取得する
    return $navView;
  }



  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function show(): void {
    $routeMap = $this->routeMap;
    // $groupView = $this->setGroupView();
    // $contentsListView = $this->setContentsListView();
    require_once "views/login/index.php";
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

$homeObj = new LoginController($routeMap);
$homeObj->run();