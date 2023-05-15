<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as BaseController;

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
   * コンテンツ管理のデータ取得（一覧用）
   * SQLがとんでもない長さになっているが、要はcontents_groupテーブルに登録されているcontentsテーブルのレコードをカウントしている
   *
   * @return array $view
   */
  private function setGroupListView(): array {
    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $QueryObj->setGroupListView();
    return $view;
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  private function show(): void {
    $routeMap = $this->routeMap;
    $navView = $this->setContentsNavView();
    $groupView = $this->setGroupView();
    $groupListView = $this->setGroupListView();
    // $contentsListView = $this->setContentsListView();
    require_once "views/contents/group/list/index.php";
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