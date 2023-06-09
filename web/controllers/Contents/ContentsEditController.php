<?php

namespace Liqsyst\Controllers\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once('lib/Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as BaseController;

class ContentsEditController extends BaseController {

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
   * コンテンツ管理の編集用データ取得（formに表示する用）
   *
   * @return array $view
   */
  private function setContentsEditView(): array {
    $index = 2;
    $UtilityObj = new Utility();
    $id = $UtilityObj->getUriOneParameter($index);

    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $QueryObj->setContentsEditView($id);
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
    // $contentsListView = $this->setContentsListView();
    $contentsEditView = $this->setContentsEditView();
    
     // $_SESSION['user'] = array();
    $UtilityObj = new Utility();
    $flg = $UtilityObj->isLogin();
    if ($flg) {
      require_once "views/contents/edit/index.php";
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

$contentsObj = new ContentsEditController($routeMap);
$contentsObj->run();