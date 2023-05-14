<?php

namespace Liqsyst\Ajax\Contents\Group;

require_once(INCLUDE_LIB_PATH . 'DB.php');
use Liqsyst\Lib\DB\DBClass as DB;


/**
 * GroupDBClass
 */
class GroupDBClass {

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
   * Ajax経由で送られてきたデータをグループ別にセットする
   *
   * @param array $posts
   * @return array $data
   */
  public function setPostsdata(array $posts): array {
    $data = [];
    foreach ($posts AS $key => $val) {
      if (preg_match('#^.+_preg$#', $key)) {
        $postsPreg[$key] = $val;
      } else {
        $postsData[$key] = $val;
      }
    }
    $data['preg'] = $postsPreg;
    $data['posts'] = $postsData;
    return $data;
  }


  /**
   * Ajax経由で送られてきたデータをDB側に登録する
   *
   * @param array $posts
   * @param string $mode
   * @return array $data
   */
  public function createTableWithPostsdata(array $posts, string $mode): array {
    $query = "
      INSERT INTO contents_group (category, created_at, updated_at) VALUES (
        {$posts['category']},
        default,
        default
      );
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $data = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $data;
  }


  /**
   * Ajax経由で登録したグループと連動して、コンテンツの値を変更する
   *
   * @param array $posts
   * @return array $data
   */
  public function updateTableWithPostsdata(array $posts): array {
    $mode = 'update';
    $query = "
      UPDATE contents  
      SET category = {$posts['category']}
      WHERE id = {$posts['id']};
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $data = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $data;
  }


  /**
   * コンテンツ管理のデータをDB側から取得する
   *
   * @return array $category
   */
  public function getContentsData(): array {
    $mode = 'select';
    $posts = [];
    $query = "
      SELECT * FROM contents;
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
   *
   * @return array $view
   */
  public function getGroupData(): array {
    $mode = 'select';
    $posts = [];
    $query = "
      SELECT 
        id, name, label
      FROM contents AS C 
      WHERE NOT EXISTS (
        SELECT 1 FROM contents_group WHERE C.id = category
      );
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $view;
  }


  /**
   * コンテンツ管理のデータ取得（一覧用）
   * SQLがとんでもない長さになっているが、要はcontents_groupテーブルに登録されているcontentsテーブルのレコードをカウントしている
   *
   * @return array $view
   */
  public function getGroupListView(): array {
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
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, []);
    return $view;
  }


  /**
   * グループを削除する
   *
   * @param array $ids
   * @return array $flg
   */
  public function delContentsData(array $ids): array {
    $mode = 'delete';
    $posts = [];
    $query = "
      DELETE FROM contents_group WHERE category IN ({$ids['id']});
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $view;
  }

}