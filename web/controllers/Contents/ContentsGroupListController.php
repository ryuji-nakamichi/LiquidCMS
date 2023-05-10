<?php

namespace Liqsyst\Controllers;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/group/GroupDB.php');
use Liqsyst\Ajax\Contents\Group\GroupDBClass as GroupDB;

require_once(INCLUDE_LIB_PATH . 'DB.php');
use Liqsyst\Lib\DB\DBClass as DB;

require_once('controllers/BaseController.php');

class ContentsGroupListController extends BaseController {

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
   * コンテンツ管理のデータ取得（一覧用）
   *
   * @return array $view
   */
  private function getGroupListView(): array {
    $mode = 'select';
    $query = "
      SELECT C.id AS id, C.name AS name, C.label AS label, C.updated_at AS updated_at
      FROM contents AS C
      INNER JOIN contents_group AS CG ON C.id = CG.category;
    ";
    $DBObj = new DB(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, []);
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
    $groupListView = $this->getGroupListView(); // DBからグループ一覧のデータを取得する
    require_once "views/contents/group/index.php";
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

$contentsObj = new ContentsGroupListController($routeMap);
$contentsObj->run();