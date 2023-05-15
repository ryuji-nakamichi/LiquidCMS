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
$updatePosts = [];
$postsData = [];
$postsPreg = [];
$errFlg = [];
$searchPattern = [];
$regexFlg = 1;
$query;
$groupListView;
$mode = '';
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  
  $posts = $_POST; // jsから送られた値を格納する
  $mode = ($posts['mode']) ? $posts['mode']: '';
  $GroupDBObj = new GroupDB(DB_DSH, DB_USER, DB_PASSWORD);

  if (isset($posts['mode']) && $posts['mode'] === 'select') {
    $query = $GroupDBObj->getContentsData(); // DBからデータを取得する

    $data['res']['posts'] = [];
  } else if (isset($posts['mode']) && $posts['mode'] === 'delete') {

    $GroupDBObj->delContentsData($posts); // DBからデータを削除する
    $query = $GroupDBObj->getContentsData(); // DBからデータを取得する（Ajax後の「#nav-app」に表示するデータ）
    
    $data['res']['posts'] = $posts;

  } else {
    $setPostsdata = $GroupDBObj->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $RequestsObj = new Requests();
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    $query = $GroupDBObj->createTableWithPostsdata($setPostsdata['posts'], $mode); // jsから送られた値をDBに登録する

    $updatePosts = [
      'id' => $setPostsdata['posts']['category'],
      'category' => 0,
    ];
    $query = $GroupDBObj->updateTableWithPostsdata($updatePosts); // createTableWithPostsdataと連動して更新する

    $data['res']['posts'] = $setPostsdata['posts']; // それぞれの値をセットする
    $data['res']['preg'] = $setPostsdata['preg']; // 正規表現の種類をセットする    
  }

  $groupListView = $GroupDBObj->getGroupListView(); // DBからデータを取得する（Ajax後の「#js-contents-list」に表示するデータ）

  $data['res']['preg'] = [];
  $data['res']['errFlg'] = $regexFlg; // 正規表現の結果フラグをセットする
  $data['res']['status'] = 'ok'; // PHP処理が問題ない場合の文字列をセットする
  $data['res']['query'] = $query; // DB処理の結果をセットする
  $data['res']['groupListView'] = $groupListView; // DB処理の結果をセットする
} else {
  $data['res']['status'] = 'ng'; // PHP処理が問題ありの場合の文字列をセットする
}

echo json_encode($data);
