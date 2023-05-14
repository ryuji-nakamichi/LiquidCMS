<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/ContentsDB.php');
use Liqsyst\Ajax\Contents\ContentsDBClass as ContentsDB;

require_once(INCLUDE_LIB_PATH . 'DB.php');
use Liqsyst\Lib\DB\DBClass as DB;

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
  private function getContentsNavView(): array {
    $ContentsDBObj = new ContentsDB(DB_DSH, DB_USER, DB_PASSWORD);
    $navView = $ContentsDBObj->getContentsData(); // DBからコンテンツ管理のデータを取得する
    return $navView;
  }


  /**
   * グループ設定のViewデータ取得
   *
   * @return array $view
   */
  private function getGroupView(): array {
    $ContentsDBObj = new ContentsDB(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $ContentsDBObj->getGroupData(); // DBからコンテンツ管理のデータを取得する
    return $view;
  }


  /**
   * コンテンツ管理のデータ取得（一覧用）
   *
   * @return array $view
   */
  private function getContentsListView(): array {
    $mode = 'select';
    $query = "
      SELECT 
        id, name, label, category, 
        (CASE
          WHEN category > 0 THEN 1 ELSE 0
        END) AS category_flg,
        DATE_FORMAT(updated_at, '%Y.%m.%d %k:%i:%s') AS updated_at 
      FROM contents 
      ORDER BY id;
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
  public function show() {
    $routeMap = $this->routeMap;
    $navView = $this->getContentsNavView(); // DBからコンテンツ管理のデータを取得する
    $groupView = $this->getGroupView(); // DBからグループ設定のデータを取得する
    $contentsListView = $this->getContentsListView(); // DBからコンテンツ管理のデータを取得する（一覧用）
    require_once "views/contents/list/index.php";
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