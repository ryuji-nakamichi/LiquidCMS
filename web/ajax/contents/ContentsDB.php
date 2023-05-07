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

}