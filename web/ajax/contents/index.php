<?php

header('Content-Type: application/json; charset=utf-8');

$data['res'] = [];
$posts = [];
$errFlg = [];
$searchPattern = [];
if ( // Ajax通信か判定
  isset($_SERVER['HTTP_X_REQUESTED_WITH'])
  && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
) {

  $name = ($_POST['name']) ? $_POST['name']: '';
  $category = ($_POST['category']) ? $_POST['category']: '';

  $name_preg = ($_POST['name_preg']) ? $_POST['name_preg']: '';
  $category_preg = ($_POST['category_preg']) ? $_POST['category_preg']: '';


  // 正規表現にて正しい値か検査する
  $posts = $_POST;
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
  $data['res']['errFlg'] = $errFlg;

  $data['res']['posts'] = array(
    'name' => $name,
    'category' => $category,
  );
  $data['res']['status'] = 'ok';
} else {
  $data['res']['status'] = 'ng';
}

echo json_encode($posts);
