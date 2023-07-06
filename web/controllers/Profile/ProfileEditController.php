<?php

namespace Liqsyst\Controllers\Profile;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_LIB_PATH . 'Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once('controllers/BaseController.php');
use Liqsyst\Controllers\BaseController as BaseController;

class ProfileEditController extends BaseController {

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
   * ログインユーザーのセッションデータ取得
   *
   * @return int $id
   */
  private function getUserSession(): int {
    $id = (isset($_SESSION['user']) && $_SESSION['user']) ? $_SESSION['user']['id']: NULL;
    return $id;
  }


  /**
   * ログインユーザーの編集用データ取得（formに表示する用）
   *
   * @return array $view
   */
  private function setUserEditView(): array {
    $id = $this->getUserSession();
    $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
    $view = $QueryObj->setUserView($id);
    return $view;
  }


  /**
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  public function show(): void {
    $routeMap = $this->routeMap;
    $navView = $this->setContentsNavView();
    // $groupView = $this->setGroupView();
    // $contentsListView = $this->setContentsListView();
    $userView = $this->setUserEditView();

    // $_SESSION['user'] = array();
    $UtilityObj = new Utility();
    $flg = $UtilityObj->isLogin();
    if ($flg) {
      require_once "views/profile/index.php";
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

$profileObj = new ProfileEditController($routeMap);
$profileObj->run();