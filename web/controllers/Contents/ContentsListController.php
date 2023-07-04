<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_LIB_PATH . 'Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;


require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as BaseController;

class ContentsListController extends BaseController {

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
   * グループ設定のViewデータ取得
   *
   * @return array $view
   */
  private function setGroupView(): array {
    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $QueryObj->setGroupView(); // DBからコンテンツ管理のデータを取得する
    return $view;
  }


  /**
   * コンテンツ管理のデータ取得（一覧用）
   *
   * @return array $view
   */
  private function setContentsListView(): array {
    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $QueryObj->setContentsListView();
    return $view;
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function show() {
    $routeMap = $this->routeMap;
    $navView = $this->setContentsNavView();
    $groupView = $this->setGroupView();
    $contentsListView = $this->setContentsListView();
    
    // $_SESSION['user'] = array();
    $UtilityObj = new Utility();
    $flg = $UtilityObj->isLogin();
    if ($flg) {
      require_once "views/contents/list/index.php";
    } else {
      header('Location: /login');
      exit();
    }
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

$contentsObj = new ContentsListController($routeMap);
$contentsObj->run();