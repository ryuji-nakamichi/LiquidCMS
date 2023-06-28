<?php

namespace Liqsyst\Ajax\Contents;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/ContentsDB.php');
use Liqsyst\Ajax\Contents\ContentsDBClass as ContentsDB;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once(INCLUDE_REQUESTS_PATH . 'contents/index.php');
use Liqsyst\Requests\Contents\ContentsRegexClass as Requests;


header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
$posts = [];
$postsData = [];
$postsPreg = [];
$errFlg = [];
$searchPattern = [];
$regexFlg = 0;
$query = [];
$mode = '';
$method = '';
$name = '';
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  
  $posts = $_POST; // jsから送られた値を格納する
  $mode = ($posts['mode']) ? $posts['mode']: '';
  $method = (isset($posts['method'])) ? $posts['method']: '';
  $name = (isset($posts['name'])) ? $posts['name']: '';
  $ContentsDBObj = new ContentsDB(DB_DSH, DB_USER, DB_PASSWORD);
  $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
  $RequestsObj = new Requests();

  if (isset($mode) && $mode === 'select') {

    if ($method === 'exists') {
      $query = $QueryObj->contentsNameExists($name); // DBからデータを取得する

      $data['res']['existsFlg'] = (count($query)) ? true: false;
    } else {
      $query = $QueryObj->setContentsNavView(); // DBからデータを取得する
    }

    $data['res']['posts'] = [];
    $data['res']['preg'] = [];
  } else if (isset($mode) && $mode === 'insert') {
    $setPostsdata = $ContentsDBObj->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    if (!$regexFlg) {
      $query = $ContentsDBObj->createTableWithPostsData($setPostsdata['posts'], $mode); // jsから送られた値をDBに登録する
      $query_create = $ContentsDBObj->createTable($setPostsdata['posts'], $mode); // jsから送られた値でテーブルをDBに作成する
      $data['res']['query_create'] = $query_create;
    }
    
    $data['res']['posts'] = $setPostsdata['posts']; // それぞれの値をセットする
    $data['res']['preg'] = $setPostsdata['preg']; // 正規表現の種類をセットする
  } else if (isset($mode) && $mode === 'update') {
    $setPostsdata = $ContentsDBObj->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    if (!$regexFlg) {
      $query = $ContentsDBObj->updateTableWithPostsdata($setPostsdata['posts'], $mode); // jsから送られた値をDBに登録する
    }
    
    $data['res']['posts'] = $setPostsdata['posts']; // それぞれの値をセットする
    $data['res']['preg'] = $setPostsdata['preg']; // 正規表現の種類をセットする
  } else if (isset($mode) && $mode === 'delete') {

    $setPostsdata = $ContentsDBObj->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    if (!$regexFlg) {
      $ContentsDBObj->delContentsTable($posts); // DBからテーブルを削除する
      $ContentsDBObj->delContentsData($posts); // DBからデータを削除する
    }
    $query = $QueryObj->setContentsNavView(); // DBからデータを取得する

    $data['res']['posts'] = $posts;
    $data['res']['preg'] = [];
  }
  
  
  $data['res']['errFlg'] = $regexFlg; // 正規表現の結果フラグをセットする
  $data['res']['status'] = 'ok'; // PHP処理が問題ない場合の文字列をセットする
  $data['res']['query'] = $query; // DB処理の結果をセットする
} else {
  $data['res']['status'] = 'ng'; // PHP処理が問題ありの場合の文字列をセットする
}

echo json_encode($data);
