<?php

namespace Liqsyst\Ajax\Contents;

use \PDO;

/**
 * ContentsDBClass
 */
class ContentsDBClass {

  private $dsn = DB_DSH;
  private $user = DB_USER;
  private $password = DB_PASSWORD;
  private $dbh;

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
    $this->dbh = new PDO($this->dsn, $this->user, $this->password);
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
   * @return bool $flg
   */
  public function createTableWithPostsdata(array $posts): bool {
    $flg = false;

    // DBへ接続
    try {
      $dbh = $this->dbh;

      // クエリの実行
      $query = "SELECT 1";
      $stmt = $dbh->query($query);

      // 表示処理
      // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      //     echo $row["name"];
      // }
      $flg = true;

    } catch (PDOException $e){
      print("データベースの接続に失敗しました".$e->getMessage());
      die();
    }

    // 接続を閉じる
    $dbh = null;

    return $flg;
  }

}