<?php

namespace Liqsyst\Ajax\Logout;

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'logout/logoutDB.php');
use Liqsyst\Ajax\Logout\LogoutDBClass as LogoutDB;

require_once(INCLUDE_LIB_PATH . 'Utility.php');
use Liqsyst\Lib\Utility\UtilityClass as Utility;

require_once(INCLUDE_LIB_PATH . 'Query.php');
use Liqsyst\Lib\Query\QueryClass as Query;

require_once(INCLUDE_REQUESTS_PATH . 'logout/index.php');
use Liqsyst\Requests\Logout\LogoutRegexClass as Requests;


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
  $UtilityObj = new Utility();
  $LogoutDB = new LogoutDB(DB_DSH, DB_USER, DB_PASSWORD);
  $QueryObj = new Query(DB_DSH, DB_USER, DB_PASSWORD);
  $RequestsObj = new Requests();

  if (isset($mode) && $mode === 'logout') {

    $setPostsdata = $LogoutDB->setPostsdata($posts); // jsから送られた値をグループ別に分類する

    // 正規表現にて正しい値か検査する
    $regexFlg = $RequestsObj->run($setPostsdata['preg'], $setPostsdata['posts']);

    $key = 'user';
    $loginFlg = $UtilityObj->isLogin();

    if (!$regexFlg) {

      if ($loginFlg) {
        
        $data['res'][$key] = (isset($loginUser[$key][0])) ? $loginUser[$key][0]: NULL;
        $logoutFlg = $UtilityObj->logout($loginFlg);
        $data['res'][$key] = array();

        $data['res']['logoutFlg'] = ($logoutFlg) ? true: false;
      } else {
        $data['res']['logoutFlg'] = false;
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
