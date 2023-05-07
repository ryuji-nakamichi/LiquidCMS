<?php

namespace Liqsyst\Controllers;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/ContentsDB.php');
use Liqsyst\Ajax\Contents\ContentsDBClass as ContentsDB;

require_once('controllers/BaseController.php');

class ContentsCreateController extends BaseController {

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
   * viewファイルレンダリング読み込み
   *
   * @return void
   */
  private function showCreate(): void {
    $routeMap = $this->routeMap;
    $navView = $this->getContentsNavView(); // DBからコンテンツ管理のデータを取得する
    require_once "views/contents/create.php";
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

$contentsObj = new ContentsCreateController($routeMap);
$contentsObj->run();