<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

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
  private function showCreate(): void {
    $routeMap = $this->routeMap;
    $navView = $this->getContentsNavView(); // DBからコンテンツ管理のデータを取得する
    $groupView = $this->getGroupView(); // DBからグループ設定のデータを取得する
    require_once "views/contents/group/create/index.php";
  }

    
  /**
   * viewファイルレンダリング実行
   *
   * @return void
   */
  public function run(): void {
    $this->showCreate();
  }
}

$contentsObj = new ContentsGroupCreateController($routeMap);
$contentsObj->run();