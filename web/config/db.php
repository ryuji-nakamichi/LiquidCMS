<?php

$dsn = DB_DSH;
$user = DB_USER;
$password = DB_PASSWORD;

// DBへ接続
try {
  $dbh = new PDO($dsn, $user, $password);

  // クエリの実行
  $query = "SELECT 1";
  $stmt = $dbh->query($query);

  // 表示処理
  // while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  //     echo $row["name"];
  // }

} catch (PDOException $e) {
  print("データベースの接続に失敗しました".$e->getMessage());
  die();
}

// 接続を閉じる
$dbh = null;