<?php

namespace Liqsyst\Ajax\Contents\Group;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/group/GroupDB.php');
use Liqsyst\Ajax\Contents\Group\GroupDBClass as GroupDB;

require_once(INCLUDE_REQUESTS_PATH . 'contents/index.php');
use Liqsyst\Requests\Contents\ContentsRegexClass as Requests;


header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
$posts = [];
$postsData = [];
$postsPreg = [];
$errFlg = [];
$searchPattern = [];
$regexFlg = 1;
$query;
$mode = 'insert';
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  
  $posts = $_POST; // jsから送られた値を格納する
  $GroupDBObj = new GroupDB(DB_DSH, DB_USER, DB_PASSWORD);

  if (isset($posts['mode']) && $posts['mode'] === 'select') {
    $mode = $posts['mode'];
    $query = $GroupDBObj->getContentsData(); // DBからデータを取得する

    $data['res']['posts'] = [];
    $data['res']['preg'] = [];
  } else {
    $setPostsdata = $GroupDBObj->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $RequestsObj = new Requests();
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    $query = $GroupDBObj->createTableWithPostsdata($setPostsdata['posts'], $mode); // jsから送られた値をDBに登録する

    $data['res']['posts'] = $setPostsdata['posts']; // それぞれの値をセットする
    $data['res']['preg'] = $setPostsdata['preg']; // 正規表現の種類をセットする
  }
  
  
  $data['res']['errFlg'] = $regexFlg; // 正規表現の結果フラグをセットする
  $data['res']['status'] = 'ok'; // PHP処理が問題ない場合の文字列をセットする
  $data['res']['query'] = $query; // DB処理の結果をセットする
} else {
  $data['res']['status'] = 'ng'; // PHP処理が問題ありの場合の文字列をセットする
}

echo json_encode($data);
