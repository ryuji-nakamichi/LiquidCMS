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
   * SQLがとんでもない長さになっているが、要はcontents_groupテーブルに登録されているcontentsテーブルのレコードをカウントしている
   *
   * @return array $view
   */
  private function getGroupListView(): array {
    $mode = 'select';

    $allData = "
      SELECT
        C.id,
        C.name,
        C.category AS C_category,
        CG.category CG_category,
        (CASE
          WHEN C.category = 0 THEN 0 ELSE COUNT(C.category) OVER (PARTITION BY C.category)
        END) AS child_max,
        (CASE
          WHEN CG.category IS NOT NULL THEN 0 ELSE 1
        END) AS belong_flg
      FROM contents AS C
      LEFT JOIN contents_group AS CG ON C.id = CG.category";

    $query = "
      SELECT 
        C.id AS id,
        C.name AS name,
        C.label AS label,
        DATE_FORMAT(C.updated_at, '%Y.%m.%d %k:%i:%s') AS updated_at,
        (CASE
          WHEN allGroup.child_max > 0 THEN allGroup.child_max ELSE 0
        END) AS child_max
      FROM contents AS C
      LEFT JOIN(
        SELECT 
          C1.id,
          C1.name,
          hasChildren.C_category,
          hasChildren.child_max
        FROM(
          SELECT 
            AllData.C_category,
            AllData.child_max
          FROM (
            {$allData}
          ) AS AllData
          GROUP BY AllData.C_category, AllData.child_max
        ) AS hasChildren
        LEFT JOIN contents AS C1 ON hasChildren.C_category = C1.id
        WHERE hasChildren.child_max > 0
      ) AS allGroup ON allGroup.C_category = C.id
      LEFT JOIN contents_group AS CG2 ON C.id = CG2.category
      WHERE CG2.category IS NOT NULL;
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