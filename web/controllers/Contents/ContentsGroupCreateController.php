<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_LIB_PATH . 'Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_AJAX_PATH . 'contents/group/GroupDB.php');
use Liqsyst\Ajax\Contents\Group\GroupDBClass as GroupDB;

require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as BaseController;

class ContentsGroupCreateController extends BaseController {

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
  private function getContentsNavView(): array {
    $GroupDBObj = new GroupDB(DB_DSH, DB_USER, DB_PASSWORD);
    $navView = $GroupDBObj->getContentsData(); // DBからコンテンツ管理のデータを取得する
    return $navView;
  }


  /**
   * グループ設定のViewデータ取得
   *
   * @return array $navView
   */
  private function getGroupView(): array {
    $GroupDBObj = new GroupDB(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $GroupDBObj->getGroupData(); // DBからコンテンツ管理のデータを取得する
    return $view;
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  private function show(): void {
    $routeMap = $this->routeMap;
    $navView = $this->getContentsNavView(); // DBからコンテンツ管理のデータを取得する
    $groupView = $this->getGroupView(); // DBからグループ設定のデータを取得する
    
    // $_SESSION['user'] = array();
    $UtilityObj = new Utility();
    $flg = $UtilityObj->isLogin();
    if ($flg) {
      require_once "views/contents/group/create/index.php";
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
  public function run(): void {
    $this->show();
  }
}

$contentsObj = new ContentsGroupCreateController($routeMap);
$contentsObj->run();