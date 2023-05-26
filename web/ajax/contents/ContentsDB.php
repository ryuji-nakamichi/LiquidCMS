<?php

namespace Liqsyst\Ajax\Contents;

require_once(INCLUDE_LIB_PATH . 'DB.php');
use Liqsyst\Lib\DB\DBClass as DB;


/**
 * ContentsDBClass
 */
class ContentsDBClass {

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
      INSERT INTO contents (user_id, name, label, category, created_at, updated_at) VALUES (
        1,
        \"{$posts['name']}\",
        \"{$posts['label']}\",
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
   * Ajax経由で送られてきたデータでDBのデータを更新する
   *
   * @param array $posts
   * @param string $mode
   * @return array $data
   */
  public function updateTableWithPostsdata(array $posts, string $mode): array {
    $query = "
      UPDATE 
        contents 
      SET 
        label = \"{$posts['label']}\",
        category = \"{$posts['category']}\",
        updated_at = default
      WHERE id = \"{$posts['id']}\";
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $data = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $data;
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
   * コンテンツを削除する
   *
   * @param array $ids
   * @return array $flg
   */
  public function delContentsData(array $ids): array {
    $mode = 'delete';
    $posts = [];
    $query = "
      DELETE FROM contents WHERE id IN ({$ids['id']});
    ";
    $DBObj = new DB($this->dsn, $this->user, $this->password);
    $view = $DBObj->run($DBObj->dbData, $query, $mode, $posts);

    return $view;
  }

}