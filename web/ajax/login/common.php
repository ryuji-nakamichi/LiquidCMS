<?php

namespace Liqsyst\Ajax\Login;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'login/loginDB.php');
use Liqsyst\Ajax\Login\LoginDBClass as LoginDB;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once(INCLUDE_REQUESTS_PATH . 'login/index.php');
use Liqsyst\Requests\Login\LoginRegexClass as Requests;


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
  $LoginDB = new LoginDB(DB_DSH, DB_USER, DB_PASSWORD);
  $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
  $RequestsObj = new Requests();

  if (isset($mode) && $mode === 'select') {

    $setPostsdata = $LoginDB->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    if (!$regexFlg) {

      if ($method === 'exists') {
        $query = $QueryObj->usersExists($setPostsdata['posts']); // DBからユーザーデータを取得する

        $data['res']['existsFlg'] = (count($query)) ? true: false;
      } else {
        $data['res']['existsFlg'] = false;
      }

    }

    $data['res']['posts'] = [];
    $data['res']['preg'] = [];
  }
  
  
  $data['res']['errFlg'] = $regexFlg; // 正規表現の結果フラグをセットする
  $data['res']['status'] = 'ok'; // PHP処理が問題ない場合の文字列をセットする
  $data['res']['query'] = $query; // DB処理の結果をセットする
} else {
  $data['res']['status'] = 'ng'; // PHP処理が問題ありの場合の文字列をセットする
}

echo json_encode($data);
