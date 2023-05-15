<?php

namespace Liqsyst\Lib\Query;

require_once(INCLUDE_LIB_PATH . 'DB.php');
use Liqsyst\Lib\DB\DBClass as DB;


/**
 * QueryClass class
 * 共通で使用するSQL処理を定義する
 * 使用する際は別コントローラーなどのファイルでインスタンスを作成してから実行する
 */
class QueryClass {

  private $dsn;
  private $user;
  private $password;


  /**
   * コンストラクタ
   *
   * @param string $dsn DBサーバー
   * @param string $user DBユーザー
   * @param string $password DBパスワード
   */
  function __construct($dsn, $user, $password) {
    $this->dsn = $dsn;
    $this->user = $user;
    $this->password = $password;
  }


  /**
   * コンテンツ管理のデータをDB側から取得する
   * getContentsNavViewのデータ取得用（グローバルナビ用）
   * Getter
   *
   * @return array $category
   */
  private function getContentsNavData(): array {
    $mode = 'select';
    $posts = [];
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
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $data = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    $category = [];
    foreach((array)$data AS $key => $val) {
      $cate = ($val['category'] > 0) ? $val['category']: $val['id'];
      $category['category'][$cate][] = $val;
    }

    return $category;
  }


  /**
   * グループ設定のデータをDB側から取得する
   * getGroupViewのデータ取得用
   * Getter
   *
   * @return array $view
   */
  private function getGroupData(): array {
    $mode = 'select';
    $posts = [];
    $query = "
      SELECT C.id AS id, C.name AS name, C.label AS label 
      FROM contents AS C
      INNER JOIN contents_group AS CG ON C.id = CG.category 
      ORDER BY C.id;
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $view;
  }


  /**
   * コンテンツ管理のデータ取得（一覧用）
   * Getter
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
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, []);
    return $view;
  }


  /**
   * グループ管理のデータ取得（一覧用）
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
   * グループ管理のViewデータ取得
   * Setter
   *
   * @return array $view
   */
  public function setGroupListView(): array {
    $view = $this->getGroupListView(); // DBからコンテンツ管理のデータを取得する
    return $view;
  }


  /**
   * コンテンツ管理のViewデータ取得
   * Setter
   *
   * @return array $navView
   */
  public function setContentsNavView(): array {
    $navView = $this->getContentsNavData(); // DBからコンテンツ管理のデータを取得する
    return $navView;
  }


  /**
   * グループ設定のViewデータ取得
   * Setter
   *
   * @return array $view
   */
  public function setGroupView(): array {
    $view = $this->getGroupData(); // DBからコンテンツ管理のデータを取得する
    return $view;
  }


  /**
   * コンテンツ管理のデータ取得（一覧用）
   * Setter
   *
   * @return array $view
   */
  public function setContentsListView(): array {
    $view = $this->getContentsListView(); // DBからコンテンツ管理のデータ取得（一覧用）を取得する
    return $view;
  }

}

