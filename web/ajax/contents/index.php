<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/define.php');

require_once(INCLUDE_AJAX_PATH . 'contents/function.php');
use Liqsyst\ajax as ajax;

header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
$posts = [];
$postsData = [];
$postsPreg = [];
$errFlg = [];
$searchPattern = [];
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  
  $posts = $_POST;

  // jsから送られた値をグループ別に分類する
  $setPostsdata = ajax\setPostsdata($posts);
  $data['res']['posts'] = $setPostsdata['posts'];
  $data['res']['preg'] = $setPostsdata['preg'];

  // 正規表現にて正しい値か検査する
  // $searchPattern = $posts[''];
  // $searchPattern = '#^[^a-z_]+$#'; // 半角英字以外をエラーとして判定する
  // foreach ((array)$posts AS $key => $val) {
  //   if (preg_match($searchPattern, $val)) {
  //     $errFlg[$key] = true;
  //     // break;
  //   } else {
  //     $errFlg[$key] = false;
  //   }
  // }

  // エラーフラグをセットする
  $data['res']['errFlg'] = $errFlg;

  // foreach ($postsData AS $key => $val) {
  //   $data['res']['posts'][$key] = $val;
  // }

  // $data['res']['posts'] = array(
  //   'name' => $posts['name'],
  //   'name_preg' => $posts['name_preg'],
  //   'category' => $posts['category'],
  //   'category_preg' => $posts['category_preg'],
  // );
  $data['res']['status'] = 'ok';
} else {
  $data['res']['status'] = 'ng';
}

echo json_encode($data);
//echo $posts['name'];
