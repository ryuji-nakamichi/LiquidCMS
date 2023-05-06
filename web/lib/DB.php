<?php


namespace Liqsyst\Lib\DB;

use \PDO;


/**
* DBClass
*  
*/
class DBClass {


  private $dsn;
  private $user;
  private $password;
  private $dbh;

  public $dbData;


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

    $this->dbData['dsn'] = $this->dsn;
    $this->dbData['user'] = $this->user;
    $this->dbData['password'] = $this->password;
  }


   /**
   * DB側に接続する
   *
   * @param array $dbData
   * @return void
   */
  public function DBConnect(array $dbData): void {
    $this->dbh = new PDO($dbData['dsn'], $dbData['user'], $dbData['password']);
  }


  /**
   * DB側に接続を破棄する
   *
   * @return void
   */
  public function DBClose(): void {
    $this->dbh = null;
  }


  /**
   * DB側でSQLを実行する
   *
   * @param string $query
   * @param string $mode
   * @param array $posts 今の所使用していない
   * @return array $data
   */
  public function DBQuery(string $query, string $mode, array $posts): array {
    $data = [];
    $stmt = $this->dbh->query($query);

    if ($mode === 'insert') {
      $data = ['results' => 'success'];
    } else if ($mode === 'select') {
      // 表示処理
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
      }
    }
    
    return $data;
  }


  /**
   * DB処理実行
   *
   * @param array $dbData
   * @param string $query
   * @param string $mode
   * @param array $posts
   * @return array $data
   */
  public function run(array $dbData, string $query, string $mode, array $posts): array {
    $data = [];
    try {

      $this->DBConnect($dbData);
      $data = $this->DBQuery($query, $mode, $posts);

    } catch (PDOException $e){
      print("データベースの接続に失敗しました".$e->getMessage());
      die();
    }

    $this->DBClose();

    return $data;

  }

}

